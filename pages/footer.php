</div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Roots and Herbs 2021</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
    
    <script>
    $(document).ready(function(){
        $(".add-row").click(function(){
            var name = $("#product").find('option:selected').text();
            var val = $("#product").val();
            
            var markup = "<tr><td><input type='checkbox' name='record'></td><td class = 'desc' >" + name + "</td><td class = 'bv'>" + val + "</td></tr>";
            $("table tbody:first").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody:first").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });
       $(".show").click(function(){
         var content = 0;
            $("table tbody:first").find(".bv").each(function(){
            	
                    content += Number($(this).text());
                
            });
            $("#usebv").val(content);
            var content1 = "";
            $("table tbody:first").find(".desc").each(function(){
            	
                    content1 += $(this).text()+' |';
                
            });
            $("#usedesc").val(content1);
          
        });
        </script>
</body>

</html>