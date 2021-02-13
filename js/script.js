(function($){
     jQuery(document).ready(function(){

          jQuery('.chatform').submit(function(){
               var text = jQuery('.message').val();
               $.ajax({
                    'url'     : 'chat.php',
                    'type'    : 'post',
                    'data'    : {
                         'submit'  : '',
                         'text'    : text
                    },
                    'success' : function(output){
                         jQuery('.message').val('');
                    }
               });

               return false;
          });

          setInterval(function(){
               $.ajax({
                    'url'     : 'chat.php',
                    'type'    : 'post',
                    'data'    : {
                         'update'  : '',
                    },
                    'success' : function(output){
                         jQuery('.all').html(output);
                    }
               });
          },50);


          jQuery('.userregistation').submit(function(){
               var fname      = jQuery("input[name='fname']").val();
               var lname      = jQuery("input[name='lname']").val();
               var email      = jQuery("input[name='email']").val();
               var password   = jQuery("input[name='password']").val();
               $.ajax({
                    'url'    : 'register.php',
                    'type'   : 'POST',
                    'data'   : {
                         'register': 'ase',
                         'fname'   : fname,
                         'lname'   : lname,
                         'email'   : email,
                         'password': password
                    },
                    'success': function(output){
                         jQuery('.success').html(output);
                         jQuery('.input').val('');
                    },               
               });
               return false;
          });


          jQuery('.userlogin').submit(function(){
               var email      = jQuery("input[name='email']").val();
               var password   = jQuery("input[name='password']").val();
               $.ajax({
                    'url'    : 'login.php',
                    'type'   : 'POST',
                    'data'   : {
                         'login': 'ase',
                         'email'   : email,
                         'password': password
                    },
                    'success': function(output){
                         jQuery('.error').html(output);
                    },               
               });
               //return false;
          })





//      jQuery('.register').click(function(){
//           $.ajax({
//                'url'    : 'register.php',
//                'type'   : 'POST',
//                'data'   : {
//                     'register'     : 'ase'
//                },
//                'success': function(output){
//                     jQuery('.box').html(output);
//                },
//           });
//      return false;
//      });

//      jQuery('.login').click(function(){
//           $.ajax({
//                'url'     : 'login.php',
//                'type'    : 'POST',
//                'data'    : {
//                     'login'   : 'ase'
//                },
//                'success' : function(output){
//                     jQuery('.box').html(output);
//                }
//           });
//      return false;
//      });
     




});

}(jQuery));