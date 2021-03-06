﻿<%@ Page Title="" Language="C#" MasterPageFile="flowpaper.master" AutoEventWireup="true" CodeFile="setup.aspx.cs" Inherits="setup" %>
<asp:Content ID="HeaderContent" runat="server" ContentPlaceHolderID="HeadContent">
</asp:Content>
<asp:Content ID="BodyContent" runat="server" ContentPlaceHolderID="MainContent">
<div style="width:690px;clear:both;padding: 20px 10px 20px 10px;">
			<ul id="process" style="margin-bottom:10px;">
			<%
            switch (step)
            {
                case 1:
			%>
				<li class="first active"><span>Step 1: Server Requirements</span></li>
				<li class=""><span>Step 2: Recommended Components</span></li>
                <li class=""><span>Step 3: Configuation</span></li>
			<% 
			break;
                case 2:
			%>
				<li class="first prevactive"><span>Step 1: Server Requirements</span></li>
				<li class="active"><span>Step 2: Recommended Components</span></li>
                <li class=""><span>Step 3: Configuation</span></li>
			<% 
            break;
                case -1:
            %>
                <li class="first active"><span>Step 1: Server Requirements</span></li>
                <li class=""><span>Step 2: FlowPaper Configuation</span></li>
            <%
            break;
			default:
			%>
				<li class="first complete"><span>Step 1: Server Requirements</span></li>
				<li class="prevactive"><span>Step 2: Recommended Configuration</span></li>
                <li class="last active"><span>Step 3: Configuation</span></li>
			<% break; %>
			<% } %>			
			</ul>
		</div>

        <div style="clear:both;background-color:#fff;padding: 20px 10px 20px 30px;border:0px;-webkit-box-shadow: rgba(0, 0, 0, 0.246094) 0px 4px 8px 0px;min-width:650px;float:left;width:650px;margin-left:10px;margin-bottom:50px;">
            <% if(step == 1){ %>
            <h3>Configuration Style</h3>
            <table width="100%" cellspacing="0" cellpadding="0" class="sortable" style="width:100%;margin-bottom:60px;">
                <tr>
                    <td style="border-right:0;width:5%;background-color:#DEDEDE;">
                        <INPUT TYPE=RADIO NAME="CONFIG_TYPE" id="CONFIGMODE1" onclick="document.location.href='setup.aspx?mode=simple'" VALUE="basic" <% if(mode == "simple") { %>checked<% } %> style="vertical-align: middle">
                    </td>
                    <td style="border-left:0;width:10%;text-align:left;background-color:#DEDEDE;">
                        Basic configuration
                    </td>
                    <td style="border:0;background-color:transparent;width:1%">

                    </td>
                    <td style="border-right:0;width:5%;background-color:#DEDEDE;">
                        <INPUT TYPE=RADIO NAME="CONFIG_TYPE" id="CONFIGMODE2" onclick="document.location.href='setup.aspx?mode=advanced'" VALUE="advanced" <% if(mode == "advanced") { %>checked<%  } %> style="vertical-align: middle">
                    </td>
                    <td style="border-left:0;width:10%;text-align:left;background-color:#DEDEDE;">
                        Advanced configuration
                    </td>
                    <td style="border:0;background-color:transparent;width:5%">

                    </td>
                    <td style="border:0;background-color:transparent;font-size:11px;text-align:left;">
                        <span style="<% if(mode == "advanced") { %>display:none<% } %>">This option does not require any server components to be installed on your server and will work with the majority of devices and platforms.</span>
                        <span style="<% if(mode == "simple") { %>display:none<% } %>">This options requires you to have root/Administrator privileges on your server. Increases browser and device coverage.</span>
                    </td>
                </tr>
            </table>
            <% } %>

		    <%
            switch (step)
            {
                case 1:
                    Test t1 = new Test();
                    t1.desc = "ASP.NET can write to the config file";
                    t1.test = test_isConfigWritable();
                    t1.failmsg = "ASP.NET does not have the ability to update the config file. Change the permissions on the config file (config/config.xml) and set its permissions to \"Modify\" and \"Write\" for \"Users\" (or \"Everyone\") (see <a href=\"admin_files/images/config.ini.win.php.png\" target=\"_new\">screen shot</a>). If you have any questions on how to set permissions, please contact your host.";
                    t1.sev = 1;
                    tests.Add(t1);

                    if(mode == "advanced"){
                        Test t2 = new Test();
                        t2.desc = "SWFTools support";
                        t2.test = pdf2swfEnabled(path_to_pdf2swf + pdf2swf_exec);
                        t2.failmsg = "You may not have SwfTools installed or you are an unsupported version. Without <font color='red'>SWFTools 0.9.1</font> installed, documents will have to be published manually. Please <a href='https://github.com/flexpaper/swftools/releases/download/0.9.1/swftools-0.9.1.exe'>download SwfTools 0.9.1 from here</a>. <br/><br/>Have you installed SWFTools at a different location? Please enter the full path to your SWFTools installation below<br/><form class='devaldi'><div class='text' style='width:400px;float:left;'><input type='text' name='PDF2SWF_PATH' id='PDF2SWF_PATH' value='" + path_to_pdf2swf + "' onkeydown='updatepdf2swfpath()'/><div class='effects'></div><div class='loader'></div></div></form><br/>";
                        t2.sev = 1;
                        tests.Add(t2);
                    }
                    
                    exec_tests();
			%>
                <h3>FlowPaper Configuration: Server Requirements</h3>
			    <table width="100%" cellspacing="0" cellpadding="0" class="sortable">
					    <tr>
						    <th class="title">Test</th>
						    <th class="tr">Result</th>
					    </tr>
					    <% Response.Write(table_data); %>
			    </table>

                <% if (fatals == 0){ %>
			    <div style="margin-top:10px;float:right;">
				    <button class="tiny main n_button" type="submit" onclick="location.href='setup.aspx?step=2'"><span></span><em style="min-width:150px">On to step 2 &rarr;</em></button>&nbsp;<br/>
			    </div>
			    <% }else{ %>
			    <h4 class="warn">This server is not compatible with FlowPaper, here's why:</h4>
			    <ul class="list">
			        <% foreach (String msg in fatal_msg) {
                       Response.Write("<li>"+msg+"</li>");
                    }%>
                </ul>			
			    <% } %>
            <% break; %>
            <% case 2: %>
            <%
                Test t3 = new Test();
                t3.desc = "PDF2JSON support";
                t3.test = pdf2jsonEnabled(path_to_pdf2json + pdf2json_exec);
                t3.failmsg = "Without PDF2JSON installed, FlowPaper won't be able to publish documents to HTML format. Please download PDF2JSON from <a href='https://github.com/flexpaper/pdf2json/releases/download/v0.68/pdf2json-0.68-win32-installer.msi'>Github</a><br/>Have you installed PDF2JSON at a different location? Please enter the full path to your PDF2JSON installation below<br/><form class='devaldi'><div class='text' style='width:400px;float:left;'><input type='text' name='PDF2JSON_PATH' id='PDF2JSON_PATH' value='" + path_to_pdf2json + "' onkeydown='updatepdf2jsonpath()'/><div class='effects'></div><div class='loader'></div></div></form><br/>";
                t3.sev = 1;
                tests.Add(t3);
				
				Test t4 = new Test();
                t4.desc = "PDFTK support";
                t4.test = pdftkEnabled(path_to_pdftk + pdftk_exec);
                t4.failmsg = "The HTML5 mode cannot be used in split mode without PDFTK installed. <br/><br/>Have you installed PDFTK at a different location? Please download PDFTK <a href='https://github.com/flexpaper/pdftk/releases/download/2.02/pdftk_server-2.02-win-setup.exe'>from PDFLabs</a><br/>. Have you installed PDFTK at a different location? Please enter the full path to your PDFTK installation below<br/><form class='devaldi'><div class='text' style='width:400px;float:left;'><input type='text' name='PDFTK_PATH' id='PDFTK_PATH' value='" + path_to_pdftk + "' onkeydown='updatepdftkpath()'/><div class='effects'></div><div class='loader'></div></div></form><br/>";
                t4.sev = 2;
                tests.Add(t4);
                    
                exec_tests();
            %>
            <script type="text/javascript">
                function updatepdf2jsonpath() {
                    $('#bttn_final').hide();
                    $('#bttn_updatepath_pdf2json').show();
                }

                function updatepdf2swfpath() {
                    $('#bttn_final').hide();
                    $('#bttn_updatepath_pdf2swf').show();
                }
				
				function updatepdftkpath(){
					$('#bttn_final').hide();
					$('#bttn_updatepath_pdftk').show();
				}
		    </script>
            <h3>FlowPaper Configuration: Recommended Components</h3>
			    <table width="100%" cellspacing="0" cellpadding="0" class="sortable">
					    <tr>
						    <th class="title">Test</th>
						    <th class="tr">Result</th>
					    </tr>
					    <% Response.Write(table_data); %>
			    </table>

                <% if (fatals > 0){ %>
			    <h4 class="warn">FlowPaper will work on this server, but its features will be limited as described below.</h4>
			    <ul class="list">
			        <% foreach (String msg in fatal_msg) {
                       Response.Write("<li>"+msg+"</li>");
                    }%>
                </ul>			
			    <% } %>

                <div style="margin-top:10px;float:right;display:block" id="bttn_final">
				<button class="tiny main n_button" type="submit" onclick="location.href='setup.aspx?step=3'"><span></span><em style="min-width:150px">final step &rarr;</em></button>&nbsp;<br/>
			    </div>
			
			    <div style="margin-top:10px;float:right;display:none;" id="bttn_updatepath_pdf2json">
				    <button class="tiny main n_button" type="submit" onclick="location.href='setup.aspx?step=2&PDF2JSON_PATH='+$('#PDF2JSON_PATH').val()"><span></span><em style="min-width:150px">retry <img src='admin_files/images/reload.png' style='margin-top:3px'/></em></button>&nbsp;<br/>
			    </div>
			
			    <div style="margin-top:10px;float:right;display:none;" id="bttn_updatepath_pdf2swf">
				    <button class="tiny main n_button" type="submit" onclick="location.href='setup.aspx?step=2&PDF2SWF_PATH='+$('#PDF2SWF_PATH').val()"><span></span><em style="min-width:150px">retry <img src='admin_files/images/reload.png' style='margin-top:3px'/></em></button>&nbsp;<br/>
			    </div>
				
				<div style="margin-top:10px;float:right;display:none;" id="bttn_updatepath_pdftk">
					<button class="tiny main n_button" type="submit" onclick="location.href='setup.aspx?step=2&PDFTK_PATH='+$('#PDFTK_PATH').val()"><span></span><em style="min-width:150px">retry <img src='admin_files/images/reload.png' style='margin-top:3px'/></em></button>&nbsp;<br/>
				</div>				
		
            <% break; %>
            <% case -1: %>
            <h3>FlowPaper: Error writing to config file</h3>
            FlowPaper failed to write your settings to the configuration file. Please check the file permissions for the config.xml file or <a href="http://flowpaper.com/docs_publishing_with_ASPNET.jsp">see our documentation</a> on how to finish the configuration manually.
            <% break; %>
            <% default: %>
                <script language="JavaScript">
                    function validateConfiguration() {
                        if ($('#ADMIN_PASSWORD').val().length == 0) {
                            $('#ADMIN_PASSWORD_RESULT').html('Admin password needs to be set');
                            return false;
                        }

                        if ($('#ADMIN_USERNAME').val().length == 0) {
                            $('#ADMIN_USERNAME_RESULT').html('Admin username needs to be set');
                            return false;
                        }

                        if ($('#PDF_DIR').val().length == 0) {
                            $('#PDF_DIR_ERROR').html('PDF storage directory needs to be set');
                            return false;
                        }

                        <% if(mode == "advanced") { %>
                        if ($('#PUBLISHED_PDF_DIR').val().length == 0) {
                            $('#PUBLISHED_PDF_DIR_ERROR').html('Working directory needs to be set');
                            return false;
                        }
                        <% } %>

                        /*if($('#LICENSEKEY').val().length==0){
                        $('#LICENSEKEY_ERROR').html('License key needs to be set');
                        return false;
                        }*/
                    }
			</script>
			<h3>FlowPaper: Configuration</h3>
			<form class="devaldi" action="setup.aspx" method="post" onsubmit="return validateConfiguration()">
				<input type="hidden" id="step" name="step" value="4" />
				<table width="100%" cellspacing="0" cellpadding="0" class="sortable">
						<tr>
							<td>Admin Username</th>
							<td>
								<div class='text' style="width:150px;float:left;">
											<input type="text" name="ADMIN_USERNAME" id="ADMIN_USERNAME" value="<%=configManager.getConfig("admin.username") %>"/>
											<div class="effects"></div><div class="loader"></div>
								</div>
								<div style="float:left;font-size:10px;padding-top:5px;">The admin username you want to use for the admin publishing interface.</div>
								<div id="ADMIN_USERNAME_RESULT" class="formError" style="float:right;"></div>
							</td>
						</tr>
						
						<tr>
							<td>Admin Password</th>
							<td>
								<div class='text' style="width:150px;float:left">
											<input type="text" name="ADMIN_PASSWORD" id="ADMIN_PASSWORD" value="<%=configManager.getConfig("admin.password")%>"/>
											<div class="effects"></div><div class="loader"></div>
								</div>
								<div style="float:left;font-size:10px;padding-top:5px;">The admin password you want to use for the admin publishing interface.</div>
								<div id="ADMIN_PASSWORD_RESULT" class="formError" style="float:right;"></div>
							</td>
						</tr>
						
						<tr>
							<td style="vertical-align:top;padding-top:12px;">PDF Storage Directory</th>
							<td style="vertical-align:top;">
								<div class='text'>
											<input type="text" name="PDF_DIR" id="PDF_DIR" value=""/>
											<div class="effects"></div><div class="loader"></div>
								</div>
								<div style="float:left;font-size:10px;padding-top:5px;">Please enter the full absolute path to the directory where you want to store your PDF files</div>
								<div id="PDF_DIR_ERROR" class="formError" style="float:right;"></div>
							</td>
						</tr>
						<% if(mode == "advanced") { %>
						<tr>
							<td>Working Directory</th>
							<td>
								<div class='text'>
											<input type="text" name="PUBLISHED_PDF_DIR" id="PUBLISHED_PDF_DIR" value=""/>
											<div class="effects"></div><div class="loader"></div>
								</div>
								<div style="float:left;font-size:10px;padding-top:5px;">Please enter the full absolute path to the directory where you want to store your published files</div>
								<div id="PUBLISHED_PDF_DIR_ERROR" class="formError" style="float:right;"></div>
							</td>
						</tr>
						<% } %>
						
						<% if(configManager.getConfig("test_pdf2json")=="true"){ %>
						<tr>
							<td valign="top">
								Primary Format
							</td>
							<td>
								<div style="width:300px;float:left;">
									<select id="RenderingOrder_PRIM" name="RenderingOrder_PRIM" style="font-size:12pt;float:left;">
										<option value="flash" <% if(configManager.getConfig("renderingorder.primary") == "flash") { %>selected="true"<% } %>>flash</option>
										<option value="html" <% if(configManager.getConfig("renderingorder.primary") == "html") { %>selected="true"<% } %>>html</option>
										<option value="html5" <% if(configManager.getConfig("renderingorder.primary") == "html5") { %>selected="true"<% } %>>html5</option>
									</select>
								</div>
								<div style="float:left;font-size:10px;padding-top:5px;">This decides what to use as primary media format to use for your visitors. </div>
							</td>
						</tr>
						<% } %>
						
						<% if(configManager.getConfig("test_pdf2json")=="true"){ %>
						<tr>
							<td valign="top">
								Secondary Format
							</td>
							<td >
								<div style="width:300px;float:left;">
									<select id="RenderingOrder_SEC" name="RenderingOrder_SEC" style="font-size:12pt;float:left;">
										<option value="flash" <% if(configManager.getConfig("renderingorder.secondary") == "flash") { %>selected="true"<% } %>>flash</option>
										<option value="html" <% if(configManager.getConfig("renderingorder.secondary") == "html") { %>selected="true"<% } %>>html</option>
										<option value="html5" <% if(configManager.getConfig("renderingorder.secondary") == "html5") { %>selected="true"<% } %>>html5</option>
									</select>
								</div>	
								<div style="float:left;font-size:10px;padding-top:5px;">This decides what to use as secondary media format to use for your visitors. </div>
							</td>
						</tr>
						<% } %>

						<tr>
                            <td>Split mode publishing? </th>
                            <td>
                                    <INPUT TYPE=RADIO NAME="SPLITMODE" id="SPLITMODE1" VALUE="false" style="vertical-align: middle"> No
                                    <INPUT TYPE=RADIO NAME="SPLITMODE" id="SPLITMODE2" VALUE="true" checked="true" style="vertical-align: middle;margin-left:30px;"> Yes<BR>
                                <div style="float:left;font-size:10px;padding-top:5px;">If you generally publish large PDF documents then running split mode is recommended.</div>
                            </td>
                        </tr>

						<tr>
							<td>License Key</th>
							<td>
								<div class='text' style="width:300px;float:left;">
											<input type="text" name="LICENSEKEY" id="LICENSEKEY" value=""/>
											<div class="effects"></div><div class="loader"></div>
								</div>
								<div style="float:left;font-size:10px;padding-top:5px;">If using the commercial version, this is the key you recieved from our commercial download area.</div>
								<div id="LICENSEKEY_ERROR" class="formError" style="float:right;"></div>
							</td>
						</tr>
				</table>
				<script language="JavaScript">
				    $(document).ready(function () {
				        $("input#PDF_DIR").keyup(initTimer);
				        $("input#PDF_DIR").change(checkDirectoryChangePermissionsHandler);

				        $("input#PUBLISHED_PDF_DIR").keyup(initTimer);
				        $("input#PUBLISHED_PDF_DIR").change(checkDirectoryChangePermissionsHandler);
				    });

				    var globalTimeout;
				    var currentTimeoutField;

				    function initTimer(event) {
				        currentTimeoutField = $(this);

				        if (globalTimeout) clearTimeout(globalTimeout);
				        globalTimeout = setTimeout(checkDirectoryPermissionsHandler, 2000);
				    }

				    function checkDirectoryPermissions(obj) {
				        var infield = obj;
				        if (infield.val().length < 3) { return; }
				        $.ajax({
				            url: "checkdirpermissions.aspx?pdf2swfpath=<%=Server.UrlEncode(path_to_pdf2swf)%>&pdf2jsonpath=<%=Server.UrlEncode(path_to_pdf2json)%>&dir=" + infield.val()+"&pdfdir=" + $("input#PDF_DIR").val() + "&docsdir=" + $("input#PUBLISHED_PDF_DIR").val() + "&testpdf2json=<%=pdf2jsonEnabled(path_to_pdf2json + pdf2json_exec)%>",
				            context: document.body,
				            success: function (data) {
				                if (data == "0") {
				                    $('#' + infield.attr("id") + '_ERROR').html('Cannot write to directory. Please verify path & permissions by setting its permissions to \"Modify\" and \"Write\" for \"Users\" (or \"Everyone\") (see <a href=\"admin_files/images/config.ini.win.aspx.png\" target=\"_new\">screen shot</a>)');
				                    return false;
				                } else if (data.indexOf("-1")>=0){
									$('#' + infield.attr("id") + '_ERROR').html('Cannot execute PDF2SWF against target directory. Please verify path & permissions by setting its permissions to \"Modify\" and \"Write\" for \"Users\" (or \"Everyone\") (see <a href=\"admin_files/images/config.ini.win.aspx.png\" target=\"_new\">screen shot</a>)');
				                    return false;
								} else if (data.indexOf("-2")>=0){
									$('#' + infield.attr("id") + '_ERROR').html('Cannot execute PDF2JSON against target directory. Please verify path & permissions by setting its permissions to \"Modify\" and \"Write\" for \"Users\" (or \"Everyone\") (see <a href=\"admin_files/images/config.ini.win.aspx.png\" target=\"_new\">screen shot</a>)');
				                    return false;
								}else {
				                    $('#' + infield.attr("id") + '_ERROR').html('');
				                    return true;
				                }
				            }
				        });
				    }

				    function checkDirectoryChangePermissionsHandler(event) {
				        var infield = $(this);
				        checkDirectoryPermissions(infield);
				    }

				    function checkDirectoryPermissionsHandler(event) {
				        var infield = currentTimeoutField;
				        checkDirectoryPermissions(infield);
				    }
				</script>
				<div style="margin-top:10px;float:right;">
					<button class="tiny main n_button" type="submit"><span></span><em style="min-width:150px">Save &amp; Complete Setup</em></button>&nbsp;<br/>
				</div>
			</form>
            <% break; %>
			<% } %>
        </div>
</asp:Content>