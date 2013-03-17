
<link rel="stylesheet" href="<?php echo Kohana::$base_url ?>assets/jquery/ui/css/custom-theme/jquery-ui-1.9.0.custom.min.css" />
<script src="<?php echo Kohana::$base_url ?>assets/jquery/ui/js/jquery-ui-1.9.0.custom.js"></script>
 <style>
    #dialog label, #dialog input { display:block; }
    #dialog label { margin-top: 0.5em; }
    #dialog input, #dialog textarea { width: 95%; }
    #tabs { margin-top: 1em; width:90%;}
    #tabs li .ui-icon-close { float: left; margin: 0.4em 0.2em 0 0; cursor: pointer; }
    #add_tab { cursor: pointer; }
	#tabs *{ font-size:12px; }
	#tabs textarea{ width:100%;height:400px;}
    </style>
    <script>
    $(function() {
        var tabTitle = $( "#tab_title" ),
            tabTemplate = "<li><a href='#{href}'>#{label}</a> <span class='ui-icon ui-icon-close'>Remove Tab</span></li>",
            tabCounter = <?php echo count($contents)+1 ?>;
 
        var tabs = $( "#tabs" ).tabs();
 
        // modal dialog init: custom buttons and a "close" callback reseting the form inside
		/*
        var dialog = $( "#dialog" ).dialog({
            autoOpen: false,
            modal: true,
            buttons: {
                Add: function() {
                    addTab();
                    $( this ).dialog( "close" );
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            },
            close: function() {
                form[ 0 ].reset();
            }
        });
		*/
		
        // actual addTab function: adds new tab using the input from the form above
        function addTab(vid, title, content) {
            var label = title || "New Tab ",
                id = "tabs-" + tabCounter,
                li = $( tabTemplate.replace( /#\{href\}/g, "#" + id ).replace( /#\{label\}/g, label ) ),
                tabContentHtml  = '<input type="hidden" name="contents['+tabCounter+'][id]" id="id'+tabCounter+'" value="'+vid+'">';
                tabContentHtml += '<p>标题: <input type="text" name="contents['+tabCounter+'][title]" id="title'+tabCounter+'" value="'+label+'"></p>';
            	tabContentHtml += "\n";
            	tabContentHtml += '<p>内容: <textarea name="contents_'+tabCounter+'" id="contents_'+tabCounter+'" style="width:100%;height:400px;">'+content+'</textarea></p>';
            	 
            tabs.find( ".ui-tabs-nav" ).append( li );
            tabs.append( "<div id='" + id + "'><p>" + tabContentHtml + "</p></div>" );
            tabs.tabs( "refresh" );
			KindEditor.create('#contents_'+tabCounter, {
					langType : '<?php echo isset($lang) ? $lang : 'zh_CN' ?>'
				});
            tabCounter++;
        }
 
        // addTab button: just opens the dialog
		
        $( "#add_tab" )
            .click(function() {
			
				var dialog = art.dialog({
					title: '增加Tab',
					content: 'Tag标题: <input type="text" name="tab_title" id="tab_title" value="" class="normal" />',
					title: text_edit,
					okVal: btn_save,
					cancelVal: btn_close,
					ok: function(){
						topVal = $('#tab_title').val();
						addTab(0, topVal, '');
						return true;
					},
					cancel:true,
				});
            });
 
        // close icon: removing the tab on click
        $( "#tabs span.ui-icon-close" ).live( "click", function() {
            var panelId = $( this ).closest( "li" ).remove().attr( "aria-controls" );
            $( "#" + panelId ).remove();
            tabs.tabs( "refresh" );
        });
		
		
    });
	
    </script>

<div id="tabs">
    <ul>
        <li style="float:right"><button type="button" id="add_tab">Add Tab</button></li>
		<?php foreach ($contents as $i => $v) { ?>
		<li><a href="#tabs-<?php echo $i ?>"><?php echo $v->title ?></a> <span class="ui-icon ui-icon-close">Remove Tab</span></li>
		<?php } ?>
    </ul>
	<?php if ( empty($contents)) $contents= array((object)array('id' => 0, 'title' => 'New', 'content' => ''));?>
	<?php foreach ($contents as $i => $v) { ?>
	<div id="tabs-<?php echo $i ?>" aria-labelledby="ui-id-<?php echo $i ?>" class="ui-tabs-panel ui-widget-content" <?php echo $i > 0 ? 'style="display:none"' : '' ?>>
		<p></p>
		<input type="hidden" name="contents[<?php echo $i ?>][id]" id="id<?php echo $i ?>" value="<?php echo $v->id ?>">
		<p>标题: <input type="text" name="contents[<?php echo $i ?>][title]" id="title<?php echo $i ?>" value="<?php echo $v->title ?>" class="valid"></p>
		<p>内容: <?php echo View::factory('widget/editor', array('field' => "contents_{$i}", 'value' => $v->content)) ?></p>
		<p></p>
	</div>
	<?php } ?>
</div>