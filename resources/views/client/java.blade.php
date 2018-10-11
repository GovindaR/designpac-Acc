<script>
     var newData={
         "Marketing":[],
         "Development":[],
         "Design": []
     };
     function checkNickname(nickname){
         var subnickname = nickname.split(":")[1];
         subnickname = subnickname.replace(/\s/g,'');
         return subnickname;
     }
   $.ajax({
       url: "./json.html",
       success: function(data){
           var data = JSON.parse(data);
           //console.log(data);
           var html = "",nm="";
          //$('#dpac').html(data.data[0].id);
           for(var i=0; i<data.data.length;i++){
              html += "<p>"+data.data[i].id+"</p>";
               nm = checkNickname(data.data[i].nickname);
              // html += "<strong>"+nm+"</strong>";
               console.log(nm);
               if(nm == "M"){
                   newData.Marketing.push({"id":data.data[i].id});
               }else if(nm == "Dev"){
                   newData.Development.push({"id":data.data[i].id});
               }else if(nm == "D"){
                   newData.Design.push({"id":data.data[i].id});
               }
           }
           //$('#dpac').html(html);
           //console.log(newData.Marketing);
           localStorage.setItem("package",JSON.stringify(newData));
       }
   });
     $('#dpac a').on("click",function(e){
         e.preventDefault();
         $target = $(this).attr("href");
         var nData = localStorage.getItem("package");
         nData = JSON.parse(nData);
         var html = "";
         if($target == "marketing"){
             html = "";
             for(var i =0;i<nData.Marketing.length;i++){
                 html += '<a href="#">'+nData.Marketing[i].id+'</a>';
             }
             //$('#dpac').html(html);
         }else if($target == "development"){
             html = "";
             for(var i =0;i<nData.Development.length;i++){
                 html += '<a href="#">'+nData.Development[i].id+'</a>';
             }
             //$('#dpac').html(html);
         }else if($target == "design"){
             html = "";
             for(var i =0;i<nData.Design.length;i++){
                 html += '<a href="#">'+nData.Design[i].id+'</a>';
             }
             //$('#dpac').html(html);
         }
         $('#dpac').html(html);


   });
 </script>