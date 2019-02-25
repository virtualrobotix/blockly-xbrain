<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  	<meta name="robots" content="" >
	<meta name="generator" content="" >
	<meta name="keywords" content="minimo js ahah" >
	<meta name="description" content="" >
	<meta name="MSSmartTagsPreventParsing" content="true" >
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="distribution" content="global" >
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
	<meta http-equiv="Resource-Type" content="document" >

  <title>Blockly code easy</title>
  <link rel="stylesheet" href="theme.css"  />

  
  <script src="./blockly/blockly_compressed.js"></script>
  <script src="./blockly/blocks_compressed.js"></script>
  <script src="./blockly/python_compressed.js"></script>
  <script src="code.js"></script>

  <script>
	function parse_get(){
  var args = new Array();
  var query = window.location.search.substring(1);
  if (query){
    var strList = query.split('&');
    for(str in strList){
      var parts = strList[str].split('=');
      args[unescape(parts[0])] = unescape(parts[1]);
    }
  }
  return args;
}
var $_GET=parse_get();

	  
	function saveCode(filename,source,code){
		var Service="save.php";
		var xhr = new XMLHttpRequest();
		xhr.open('POST', Service, true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.onload = function () {
				// do something to response
				console.log(this.responseText);
		};
		xhr.send('filename='+filename+'&source='+source+'&code='+code);
	}

	function loadCode(){
		var filepath="saves/"+filename.value+".xml";
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				var xml_text=xmlhttp.responseText;
				var xml = Blockly.Xml.textToDom(xml_text);
				Blockly.mainWorkspace.clear();
				Blockly.Xml.domToWorkspace(Blockly.mainWorkspace, xml);
			}
		}	    
		xmlhttp.open("GET",filepath,true);
		xmlhttp.send();
	}


    function Python_showCode() {
      // Generate Python code and display it.
      Blockly.Python.INFINITE_LOOP_TRAP = null;
      var code = Blockly.Python.workspaceToCode();
      alert(code);
    }

    function Python_runCode() {
        // Generate JavaScript code and display it.
        Blockly.Python.INFINITE_LOOP_TRAP = null;
        var code = Blockly.Python.workspaceToCode();
        var Service="savePython.php";
		var xhr = new XMLHttpRequest();
		xhr.open('POST', Service, true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.onload = function () {
    		// do something to response
			console.log(this.responseText);
		};
		xhr.send('code='+code);

    }

    function generateCode() {
      var code = Blockly.Python.workspaceToCode();
      var xml = Blockly.Xml.workspaceToDom(Blockly.mainWorkspace);
      var xml_text = Blockly.Xml.domToText(xml);
		saveCode(filename.value,xml_text,code);
    }
	
  </script>
</head>
<body>

	 <span class='label'>project name</span>
	<input type="text" name="filename" id='filename' placeholder="filename" value='new'>
	<button class='blue button' onclick="loadCode();">load</button>  
    <button class='red button'onclick="generateCode();">save</button>
    <button class='grey button'onclick="Python_showCode();">Python</button>
    <button class='green button'onclick="Python_runCode();">run Python</button>
    
    <select id="languageMenu"></select>
  </span>

   <div name="blocklyDiv" id="blocklyDiv" style="width: 100%;"></div>
   <script>blocklyDiv.style.height=''+eval(window.innerHeight - 64)+'px';</script> 
  
  <xml id="toolbox" style="display: none">
    <category name="%{BKY_CATLOGIC}" colour="%{BKY_LOGIC_HUE}">
      <block type="controls_if"></block>
      <block type="logic_compare"></block>
      <block type="logic_operation"></block>
      <block type="logic_negate"></block>
      <block type="logic_boolean"></block>
      <block type="logic_null"></block>
      <block type="logic_ternary"></block>
    </category>
    <category name="%{BKY_CATLOOPS}" colour="%{BKY_LOOPS_HUE}">
      <block type="controls_repeat_ext">
        <value name="TIMES">
          <shadow type="math_number">
            <field name="NUM">10</field>
          </shadow>
        </value>
      </block>
      <block type="controls_whileUntil"></block>
      <block type="controls_for">
        <value name="FROM">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="TO">
          <shadow type="math_number">
            <field name="NUM">10</field>
          </shadow>
        </value>
        <value name="BY">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
      </block>
      <block type="controls_forEach"></block>
      <block type="controls_flow_statements"></block>
    </category>
    <category name="%{BKY_CATMATH}" colour="%{BKY_MATH_HUE}">
      <block type="math_number">
        <field name="NUM">123</field>
      </block>
      <block type="math_arithmetic">
        <value name="A">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="B">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
      </block>
      <block type="math_single">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">9</field>
          </shadow>
        </value>
      </block>
      <block type="math_trig">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">45</field>
          </shadow>
        </value>
      </block>
      <block type="math_constant"></block>
      <block type="math_number_property">
        <value name="NUMBER_TO_CHECK">
          <shadow type="math_number">
            <field name="NUM">0</field>
          </shadow>
        </value>
      </block>
      <block type="math_round">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">3.1</field>
          </shadow>
        </value>
      </block>
      <block type="math_on_list"></block>
      <block type="math_modulo">
        <value name="DIVIDEND">
          <shadow type="math_number">
            <field name="NUM">64</field>
          </shadow>
        </value>
        <value name="DIVISOR">
          <shadow type="math_number">
            <field name="NUM">10</field>
          </shadow>
        </value>
      </block>
      <block type="math_constrain">
        <value name="VALUE">
          <shadow type="math_number">
            <field name="NUM">50</field>
          </shadow>
        </value>
        <value name="LOW">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="HIGH">
          <shadow type="math_number">
            <field name="NUM">100</field>
          </shadow>
        </value>
      </block>
      <block type="math_random_int">
        <value name="FROM">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="TO">
          <shadow type="math_number">
            <field name="NUM">100</field>
          </shadow>
        </value>
      </block>
      <block type="math_random_float"></block>
      <block type="math_atan2">
        <value name="X">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="Y">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
      </block>
    </category>
    <category name="%{BKY_CATTEXT}" colour="%{BKY_TEXTS_HUE}">
      <block type="text"></block>
      <block type="text_join"></block>
      <block type="text_append">
        <value name="TEXT">
          <shadow type="text"></shadow>
        </value>
      </block>
      <block type="text_length">
        <value name="VALUE">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_isEmpty">
        <value name="VALUE">
          <shadow type="text">
            <field name="TEXT"></field>
          </shadow>
        </value>
      </block>
      <block type="text_indexOf">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">{textVariable}</field>
          </block>
        </value>
        <value name="FIND">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_charAt">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">{textVariable}</field>
          </block>
        </value>
      </block>
      <block type="text_getSubstring">
        <value name="STRING">
          <block type="variables_get">
            <field name="VAR">{textVariable}</field>
          </block>
        </value>
      </block>
      <block type="text_changeCase">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_trim">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_print">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_prompt_ext">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
    </category>
    <category name="%{BKY_CATLISTS}" colour="%{BKY_LISTS_HUE}">
      <block type="lists_create_with">
        <mutation items="0"></mutation>
      </block>
      <block type="lists_create_with"></block>
      <block type="lists_repeat">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">5</field>
          </shadow>
        </value>
      </block>
      <block type="lists_length"></block>
      <block type="lists_isEmpty"></block>
      <block type="lists_indexOf">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">{listVariable}</field>
          </block>
        </value>
      </block>
      <block type="lists_getIndex">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">{listVariable}</field>
          </block>
        </value>
      </block>
      <block type="lists_setIndex">
        <value name="LIST">
          <block type="variables_get">
            <field name="VAR">{listVariable}</field>
          </block>
        </value>
      </block>
      <block type="lists_getSublist">
        <value name="LIST">
          <block type="variables_get">
            <field name="VAR">{listVariable}</field>
          </block>
        </value>
      </block>
      <block type="lists_split">
        <value name="DELIM">
          <shadow type="text">
            <field name="TEXT">,</field>
          </shadow>
        </value>
      </block>
      <block type="lists_sort"></block>
    </category>
    <category name="%{BKY_CATCOLOUR}" colour="%{BKY_COLOUR_HUE}">
      <block type="colour_picker"></block>
      <block type="colour_random"></block>
      <block type="colour_rgb">
        <value name="RED">
          <shadow type="math_number">
            <field name="NUM">100</field>
          </shadow>
        </value>
        <value name="GREEN">
          <shadow type="math_number">
            <field name="NUM">50</field>
          </shadow>
        </value>
        <value name="BLUE">
          <shadow type="math_number">
            <field name="NUM">0</field>
          </shadow>
        </value>
      </block>
      <block type="colour_blend">
        <value name="COLOUR1">
          <shadow type="colour_picker">
            <field name="COLOUR">#ff0000</field>
          </shadow>
        </value>
        <value name="COLOUR2">
          <shadow type="colour_picker">
            <field name="COLOUR">#3333ff</field>
          </shadow>
        </value>
        <value name="RATIO">
          <shadow type="math_number">
            <field name="NUM">0.5</field>
          </shadow>
        </value>
      </block>
    </category>
    <sep></sep>
    <category name="%{BKY_CATVARIABLES}" colour="%{BKY_VARIABLES_HUE}" custom="VARIABLE"></category>
    <category name="%{BKY_CATFUNCTIONS}" colour="%{BKY_PROCEDURES_HUE}" custom="PROCEDURE"></category>
        <sep></sep>
    <category id="xbrain" name="XBrain" colour="210">
      <block type="connect"></block>
      <block type="vehicle_mode"></block>
      <block type="vehicle_arm"></block>
      <block type="sleep"></block>
      <block type="arm_and_takeoff"></block>
      <block type="close"></block>
    </category>
    <category id="xvehicle" name="XVehicle" colour="210">
      <block type="is_armable"></block>
      <block type="is_armed"></block>
      <block type="simple_takeoff"></block>
      <block type="vehicle_location"></block>
      <block type="location_globalrelativeframe"></block>
      <block type="globalrelativeframe_alt"></block>
    </category>
  </xml>
</body>
</html>
