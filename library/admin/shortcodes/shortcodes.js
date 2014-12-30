(function () {
		   
	// Get the URL to this script file (as JavaScript is loaded in order)
	// (http://stackoverflow.com/questions/2255689/how-to-get-the-file-path-of-the-currenctly-executing-javascript-code)
	var scripts = document.getElementsByTagName( "script"),
	src = scripts[scripts.length-1].src;
	
	if ( scripts.length ) {
		for ( i in scripts ) {
			var scriptSrc = '';
			if ( typeof scripts[i].src != 'undefined' ) { scriptSrc = scripts[i].src; } // End IF Statement
			var txt = scriptSrc.search( 'shortcodes' );
			if ( txt != -1 ) {
				src = scripts[i].src;
			} // End IF Statement
		} // End FOR Loop
	} // End IF Statement

	var framework_url = src.split( '/shortcodes/' );
	var icon_url = framework_url[0] + '/shortcodes/shortcodes.png';
		   
	tinymce.create("tinymce.plugins.ST_Shortcodes", {
		init: function (d, e) {
			d.addCommand("scnOpenDialog", function (a, c) {
				scnSelectedShortcodeType = c.identifier;
				jQuery.get(e + "/dialog.php", function (b) {
					jQuery("#scn-dialog").remove();
					jQuery("body").append(b);
					jQuery("#scn-dialog").hide();
					var f = jQuery(window).width();
					b = jQuery(window).height();
					f = 720 < f ? 720 : f;
					f -= 80;
					b -= 84;
					tb_show("Insert Shortcode", "#TB_inline?width=" + f + "&height=" + b + "&inlineId=scn-dialog");
					jQuery("#scn-options h3:first").text("Customize the " + c.title + " Shortcode")
				})
			});
			d.onNodeChange.add(function (a, c) {
				c.setDisabled("scn_button", a.selection.getContent().length > 0)
			})
		},
		createControl: function (d, e) {
			if (d == "scn_button") {
				d = e.createMenuButton("scn_button", {
					title: "Insert Shortcode",
					image: icon_url,
					icons: false
				});
				var a = this;
				d.onRenderMenu.add(function (c, b) {
					c = b.addMenu({
						title: "Heading"
					});
					a.addImmediate(c, 'Heading H1', '[h1] YOUR TEXT HERE [/h1] <br /><br />');
					a.addImmediate(c, 'Heading H2', '[h2] YOUR TEXT HERE [/h2] <br /><br />');
					a.addImmediate(c, 'Heading H3', '[h3] YOUR TEXT HERE [/h3] <br /><br />');
					a.addImmediate(c, 'Heading H4', '[h4] YOUR TEXT HERE [/h4] <br /><br />');
					a.addImmediate(c, 'Heading H5', '[h5] YOUR TEXT HERE [/h5] <br /><br />');
					a.addImmediate(c, 'Heading H6', '[h6] YOUR TEXT HERE [/h6] <br /><br />');
					
					c = b.addMenu({
						title: "Highlight"
					});					
					a.addImmediate(c, 'Blue', '[highlight color="blue"] YOUR TEXT HERE [/highlight] ');
					a.addImmediate(c, 'Slate', '[highlight color="slate"] YOUR TEXT HERE [/highlight] ');
					a.addImmediate(c, 'Pink', '[highlight color="pink"] YOUR TEXT HERE [/highlight] ');
					a.addImmediate(c, 'Lamb', '[highlight color="lamb"] YOUR TEXT HERE [/highlight] ');
					a.addImmediate(c, 'Red', '[highlight color="red"] YOUR TEXT HERE [/highlight] ');
					a.addImmediate(c, 'Green', '[highlight color="green"] YOUR TEXT HERE [/highlight] ');
					a.addImmediate(c, 'Terra', '[highlight color="terra"] YOUR TEXT HERE [/highlight] ');
					a.addImmediate(c, 'Grey', '[highlight color="grey"] YOUR TEXT HERE [/highlight] ');
					a.addImmediate(c, 'Brown', '[highlight color="brown"] YOUR TEXT HERE [/highlight] ');
					a.addImmediate(c, 'Dark', '[highlight color="dark"] YOUR TEXT HERE [/highlight] ');
					
					c = b.addMenu({
						title: "Icon List"
					});					
					a.addImmediate(c, 'Circle', '[icon_list type="circle"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Disc', '[icon_list type="disc"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Arrow', '[icon_list type="arrow"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Star', '[icon_list type="star"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Diamond', '[icon_list type="diamond"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Errorli', '[icon_list type="errorli"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Info', '[icon_list type="info"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Locked', '[icon_list type="locked"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Minus', '[icon_list type="minus"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Newli', '[icon_list type="newli"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Okay', '[icon_list type="okay"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Pencil', '[icon_list type="pencil"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Refresh', '[icon_list type="refresh"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Small_blue', '[icon_list type="small_blue"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Triangel', '[icon_list type="triangel"] YOUR LIST HERE [/icon_list] ');
					a.addImmediate(c, 'Volume', '[icon_list type="volume"] YOUR LIST HERE [/icon_list] ');
					
					c = b.addMenu({
						title: "Button"
					});
					
					d = c.addMenu({
						title: "Button Small"
					});
					a.addImmediate(d, 'Blue', '[button_small color="blue" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Slate', '[button_small color="slate" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Pink', '[button_small color="pink" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Lamb', '[button_small color="lamb" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Red', '[button_small color="red" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Green', '[button_small color="green" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Terra', '[button_small color="terra" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Grey', '[button_small color="grey" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Brown', '[button_small color="brown" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Dark', '[button_small color="dark" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'White', '[button_small color="white" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Black', '[button_small color="black" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Purple', '[button_small color="purple" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					a.addImmediate(d, 'Orange', '[button_small color="orange" url="#"] YOUR TEXT HERE [/button_small] <br /><br />');
					
					d = c.addMenu({
						title: "Button Medium"
					});
					a.addImmediate(d, 'Blue', '[button_medium color="blue" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Slate', '[button_medium color="slate" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Pink', '[button_medium color="pink" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Lamb', '[button_medium color="lamb" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Red', '[button_medium color="red" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Green', '[button_medium color="green" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Terra', '[button_medium color="terra" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Grey', '[button_medium color="grey" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Brown', '[button_medium color="brown" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Dark', '[button_medium color="dark" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'White', '[button_medium color="white" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Black', '[button_medium color="black" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Purple', '[button_medium color="purple" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					a.addImmediate(d, 'Orange', '[button_medium color="orange" url="#"] YOUR TEXT HERE [/button_medium] <br /><br />');
					
					d = c.addMenu({
						title: "Button Large"
					});
					a.addImmediate(d, 'Blue', '[button_large color="blue" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Slate', '[button_large color="slate" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Pink', '[button_large color="pink" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Lamb', '[button_large color="lamb" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Red', '[button_large color="red" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Green', '[button_large color="green" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Terra', '[button_large color="terra" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Grey', '[button_large color="grey" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Brown', '[button_large color="brown" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Dark', '[button_large color="dark" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'White', '[button_large color="white" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Black', '[button_large color="black" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Purple', '[button_large color="purple" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					a.addImmediate(d, 'Orange', '[button_large color="orange" url="#"] YOUR TEXT HERE [/button_large] <br /><br />');
					
					d = c.addMenu({
						title: "Button Icon"
					});
					a.addImmediate(d, 'Info', '[button_icon type="info" url="#"]Information[/button_icon] <br /><br />');
					a.addImmediate(d, 'Success', '[button_icon type="success" url="#"]Success[/button_icon] <br /><br />');
					a.addImmediate(d, 'Warning', '[button_icon type="warning" url="#"]Warning[/button_icon] <br /><br />');
					a.addImmediate(d, 'Error', '[button_icon type="error" url="#"]Error[/button_icon] <br /><br />');
					a.addImmediate(d, 'Add New', '[button_icon type="add" url="#"]Add New[/button_icon] <br /><br />');
					a.addImmediate(d, 'Download', '[button_icon type="download" url="#"]Download[/button_icon] <br /><br />');
					a.addImmediate(d, 'Upload', '[button_icon type="upload" url="#"]Upload[/button_icon] <br /><br />');
					a.addImmediate(d, 'Help', '[button_icon type="help" url="#"]Help[/button_icon] <br /><br />');
					a.addImmediate(d, 'Delete', '[button_icon type="delete" url="#"]Delete[/button_icon] <br /><br />');
					a.addImmediate(d, 'Custom Icon', '[button_icon type="custom" url="#" src="#"] YOUR TEXT HERE [/button_icon] <br /><br />');
					
					c = b.addMenu({
						title: "Columns"
					});
					a.addImmediate(c, 'One Half', '[one_half] YOUR 1/2 COLUMN HERE [/one_half] <br /><br />');
					a.addImmediate(c, 'One Half Last', '[one_half_last] YOUR 1/2 COLUMN HERE [/one_half_last] <br /><br />');
					a.addImmediate(c, 'One Third', '[one_third] YOUR 1/3 COLUMN HERE [/one_third] <br /><br />');
					a.addImmediate(c, 'One Third Last', '[one_third_last] YOUR 1/3 COLUMN HERE [/one_third_last] <br /><br />');
					a.addImmediate(c, 'Two Third', '[two_third] YOUR 2/3 COLUMN HERE [/two_third] <br /><br />');
					a.addImmediate(c, 'Two Third Last', '[two_third_last] YOUR 2/3 COLUMN HERE [/two_third_last] <br /><br />');
					a.addImmediate(c, 'One Fourth', '[one_fourth] YOUR 1/4 COLUMN HERE [/one_fourth] <br /><br />');
					a.addImmediate(c, 'One Fourth Last', '[one_fourth_last] YOUR 1/4 COLUMN HERE [/one_fourth_last] <br /><br />');
					a.addImmediate(c, 'Three Fourth', '[three_fourth] YOUR 3/4 COLUMN HERE [/three_fourth] <br /><br />');
					a.addImmediate(c, 'Three Fourth Last', '[three_fourth_last] YOUR 3/4 COLUMN HERE [/three_fourth_last] <br /><br />');
					a.addImmediate(c, 'One Fifth', '[one_fifth] YOUR 1/5 COLUMN HERE [/one_fifth] <br /><br />');
					a.addImmediate(c, 'One Fifth Last', '[one_fifth_last] YOUR 1/5 COLUMN HERE [/one_fifth_last] <br /><br />');
					a.addImmediate(c, 'Two Fifth', '[two_fifth] YOUR 2/5 COLUMN HERE [/two_fifth] <br /><br />');
					a.addImmediate(c, 'Two Fifth Last', '[two_fifth_last] YOUR 2/5 COLUMN HERE [/two_fifth_last] <br /><br />');
					a.addImmediate(c, 'Three Fifth', '[three_fifth] YOUR 3/5 COLUMN HERE [/three_fifth] <br /><br />');
					a.addImmediate(c, 'Three Fifth Last', '[three_fifth_last] YOUR 3/5 COLUMN HERE [/three_fifth_last] <br /><br />');
					a.addImmediate(c, 'Four Fifth', '[four_fifth] YOUR 4/5 COLUMN HERE [/four_fifth] <br /><br />');
					a.addImmediate(c, 'Four Fifth Last', '[four_fifth_last] YOUR 4/5 COLUMN HERE [/four_fifth_last] <br /><br />');
					
					c = b.addMenu({
						title: "Dropcaps"
					});
					a.addImmediate(c, 'Dropcap 1', '[dropcap1] YOUR TEXT HERE [/dropcap1] ');
					a.addImmediate(c, 'Dropcap 2', '[dropcap2] YOUR TEXT HERE [/dropcap2] ');
					
					c = b.addMenu({
						title: "Alert Box"
					});
					a.addImmediate(c, 'Success Box', '[success_box title="TITLE"] YOUR CONTENT HERE [/success_box] <br /><br />');
					a.addImmediate(c, 'Warning Box', '[warning_box title="TITLE"] YOUR CONTENT HERE [/warning_box] <br /><br />');
					a.addImmediate(c, 'Error Box', '[error_box title="TITLE"] YOUR CONTENT HERE [/error_box] <br /><br />');
					a.addImmediate(c, 'Info Box', '[info_box title="TITLE"] YOUR CONTENT HERE [/info_box] <br /><br />');
					a.addImmediate(c, 'Help Box', '[help_box title="TITLE"] YOUR CONTENT HERE [/help_box] <br /><br />');
					
					c = b.addMenu({
						title: "Image &amp; Video"
					});
					a.addImmediate(c, 'Image', '[image src="#"] <br /><br />');
					a.addImmediate(c, 'Lightbox', '[lightbox url="#"] YOUR CONTENT HERE [/lightbox] <br /><br />');
					a.addImmediate(c, 'Youtube', '[youtube] YOUR LINK HERE [/youtube] <br /><br />');
					a.addImmediate(c, 'Vimeo', '[vimeo] YOUR LINK HERE [/vimeo] <br /><br />');
					
					c = b.addMenu({
						title: "Divider &amp; Space"
					});
					a.addImmediate(c, 'Divider', '[divider] <br /><br />');
					a.addImmediate(c, 'Divider Hidden', '[divider_hidden] <br /><br />');
					a.addImmediate(c, 'Space', '[space height="50"] <br /><br />');
					
					c = b.addMenu({
						title: "Tabs &amp; Accordions"
					});
					a.addImmediate(c, 'Tabs', '	[tabs]<br />\
												[tab title="TITLE"] YOUR CONTENT HERE [/tab]<br />\
												[tab title="TITLE"] YOUR CONTENT HERE [/tab]<br />\
												[tab title="TITLE"] YOUR CONTENT HERE [/tab]<br />\
												[/tabs] <br /><br />');
					a.addImmediate(c, 'Toogle Accordions', '[accordions keep_open="true"]<br />\
													 [accordion title="TITLE"] YOUR CONTENT HERE [/accordion]<br />\
													 [accordion title="TITLE"] YOUR CONTENT HERE [/accordion]<br />\
													 [accordion title="TITLE"] YOUR CONTENT HERE [/accordion]<br />\
													 [/accordions] <br /><br />');
					a.addImmediate(c, 'Accordions', '[accordions keep_open="false"]<br />\
													 [accordion title="TITLE"] YOUR CONTENT HERE [/accordion]<br />\
													 [accordion title="TITLE"] YOUR CONTENT HERE [/accordion]<br />\
													 [accordion title="TITLE"] YOUR CONTENT HERE [/accordion]<br />\
													 [/accordions] <br /><br />');
					a.addImmediate(c, 'Sliders', '	[sliders]<br />\
													[slider] YOUR CONTENT HERE [/slider]<br />\
													[slider] YOUR CONTENT HERE [/slider]<br />\
													[slider] YOUR CONTENT HERE [/slider]<br />\
													[/sliders] <br /><br />');
					
					c = b.addMenu({
						title: "Blog &amp; Portfolio"
					});
					a.addImmediate(c, 'Blog Slider', '[blog title="TITLE" category="" item=""] <br /><br />');
					a.addImmediate(c, 'Portfolio Slider', '[portfolio title="TITLE" category="" item=""] <br /><br />');
					
					a.addImmediate(b, 'Code', '[code] YOUR CODE HERE [/code] <br /><br />');
					a.addImmediate(b, 'Blockquote', '[quote] YOUR CONTENT HERE [/quote] <br /><br />');
					a.addImmediate(b, 'Pricing Table', '[price_list category="" count="3" currency="$" billing_cycle="Month"] <br /><br />');
					
					b.addSeparator();
					//
				});
				return d
			}
			return null
		},
		addImmediate: function (d, e, a) {
			d.add({
				title: e,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("mceInsertContent", false, a)
				}
			})
		},
		addWithDialog: function (d, e, a) {
			d.add({
				title: e,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("scnOpenDialog", false, {
						title: e,
						identifier: a
					})
				}
			})
		},
		getInfo: function () {
			return {
				longname: "SliceTheme Shortcode Generator",
				author: "VisualShortcodes.com",
				authorurl: "http://visualshortcodes.com",
				infourl: "http://visualshortcodes.com/shortcode-ninja",
				version: "1.0"
			}
		}
	});
	tinymce.PluginManager.add("ST_Shortcodes", tinymce.plugins.ST_Shortcodes)
})();