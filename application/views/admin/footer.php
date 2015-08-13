				<div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        <p id="footer">Copy by Manageer System!</p>
    </div>
    <!-- // #wrapper -->
	
</body>
<script type="text/javascript">
	function show_error(msg)
	{
		$("body").append('<div id="error_show"></div><div class="error_box"><div class="error_content"><div class="error_title">错误<div class="error_close">×</div></div><p>'+msg+'</p></div></div>');
		$(".error_close").click(function(){$("#error_show").hide().remove();$(".error_box").hide().remove();});
	}
</script>
</html>
