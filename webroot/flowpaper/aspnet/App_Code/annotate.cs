using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.IO;
using System.Text;

namespace lib
{
    public class annotate
    {
        protected lib.Config configManager;

        public annotate(String mapPath)
        {
            configManager = new Config(mapPath);
        }

        public String convert(string pdfdoc,string stampfile)
        { String command = "";
            try
            {
                String output = "";

                // save stampfile to docs directory
                Random random = new Random();
                int randomNumber = random.Next(0, 10000);
                String stampfilename = pdfdoc + "_stampfile" + randomNumber + ".pdf";
                String[] data = stampfile.Split(',');

                byte[] bytes = Convert.FromBase64String(data[1]);
                File.WriteAllBytes(configManager.getConfig("path.swf") + stampfilename, bytes);

				command = configManager.getConfig("cmd.conversion.multistamppdf");
                command = command.Replace("{path.pdf}", configManager.getConfig("path.pdf"));
                command = command.Replace("{path.swf}", configManager.getConfig("path.swf"));
                command = command.Replace("{stampfile}", stampfilename);
                command = command.Replace("{pdffile}", pdfdoc);
                command = command.Replace("{annotatedfile}", pdfdoc + "_annotated" + randomNumber + ".pdf");

                System.Diagnostics.Process proc = new System.Diagnostics.Process();
                proc.StartInfo.FileName = command.Substring(0, command.IndexOf(".exe") + 5);
                proc.StartInfo.UseShellExecute = false;
                proc.StartInfo.WindowStyle = System.Diagnostics.ProcessWindowStyle.Hidden;
                proc.StartInfo.CreateNoWindow = true;
                //proc.StartInfo.RedirectStandardOutput = true;
                proc.StartInfo.Arguments = command.Substring(command.IndexOf(".exe") + 5);

                if (proc.Start())
                {
                    proc.WaitForExit();
                    proc.Close();
                    return "[OK,'" + randomNumber + "']";
                }
                else
                    return "[Error annotating PDF, please check your configuration]";
            }
            catch (Exception ex)
            {
                return "[" + ex.Message + "]";
            }
        }
    }
}