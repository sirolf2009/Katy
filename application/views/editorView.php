<html>

    <head>
        <title>Katy Editor</title>
        <link rel="stylesheet"  type="text/css" href="http://localhost/rsc/CSS/sirolf2009.css"/>
        <style>
            dl {width: 395px; font-size:12px}
            dd  {padding-top:15px;padding-bottom:5px;}
            dt  {padding-top:5px;padding-bottom:5px;}
            dt {float:left; padding-right: 5px;}
            dt {clear: left;}
            dt, dd {min-height:1.5em;}
        </style>
    </head>
    <body>
        <?php
        $this->load->view('commonHeader');
        $attributes = array('id' => 'editorForm');
        echo form_open('editor', $attributes);
        ?>
        <div class="contentBig">
            <div class="panel" style="width: 15%; float: left"> <!-- control panel -->
                <div class="panel2">
                    <input type="button" value="Download source as .zip"><br>
                    <input type="button" value="Copy code to clipboard"><br>
                </div>
                <div class="fileBrowser">
                    <dl>
                        <div class="fileBrowserItem" onclick="openFile(0, true);" name="fileBrowserItem" id="fileBrowserItem0"><dt><img class="fileBrowserItemImage" src="http://localhost/rsc/images/file.png"></dt><dd class="fileBrowserItemName">HTML</dd></div>
                        <div class="fileBrowserItem" onclick="openFile(1, true);" name="fileBrowserItem" id="fileBrowserItem1"><dt><img class="fileBrowserItemImage" src="http://localhost/rsc/images/file.png"></dt><dd class="fileBrowserItemName">Javascript</dd></div>
                        <div class="fileBrowserItem" onclick="openFile(2, true);" name="fileBrowserItem" id="fileBrowserItem2"><dt><img class="fileBrowserItemImage" src="http://localhost/rsc/images/file.png"></dt><dd class="fileBrowserItemName">CSS</dd></div>
                    </dl>
                </div>
            </div>
            <div class="panel" style="width: 40%"> <!-- editor panel -->
                <div contenteditable="true" id="editor" name="editor" class="editorSource" onkeyup=""></div><br>
                <input type="submit" style="float: right" onclick="submitCode();">
            </div>
            <iframe class="editorResult" id="editorResult"><!-- result panel -->
            </iframe>
            <script type="text/javascript" src="<?php echo base_url(); ?>rsc/js/editor/brush.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>rsc/js/editor/fileBrowser.js"></script>
        </div>
        <script type="text/javascript">
                            //populate result
                            var doc = document.getElementById('editorResult').contentWindow.document;
                            doc.open();
                            doc.write('<html><head><title></title><style><?php echo($this->input->post("CSS")); ?></style></head>\n\
                            <body><?php echo(html_entity_decode($this->input->post("HTML"))); ?><script type="text/javascript"><?php echo($this->input->post("JS")); ?>');
                            doc.close();
                            //populate editor
                            openFile(0, false);
                            var editor = document.getElementById("editor");
                            editor.innerHTML = localStorage.fileHTML === undefined ? "" : localStorage.fileHTML;
                            function submitCode() {
                                saveFile();
                                var inputHTML = document.createElement('input');
                                inputHTML.type = 'hidden';
                                inputHTML.name = "HTML";
                                inputHTML.value = localStorage.fileHTML === undefined ? "" : localStorage.fileHTML;
                                var inputJS = document.createElement('input');
                                inputJS.type = 'hidden';
                                inputJS.name = "JS";
                                inputJS.value = localStorage.fileJS === undefined ? "" : localStorage.fileJS;
                                alert(inputJS.value);
                                var inputCSS = document.createElement('input');
                                inputCSS.type = 'hidden';
                                inputCSS.name = "CSS";
                                inputCSS.value = localStorage.fileCSS === undefined ? "" : localStorage.fileCSS;
                                document.forms['editorForm'].appendChild(inputHTML);
                                document.forms['editorForm'].appendChild(inputJS);
                                document.forms['editorForm'].appendChild(inputCSS);
                            }
        </script>
    </body>
</html>