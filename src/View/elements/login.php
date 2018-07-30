<div style="margin-top:50px;"></div>
             
       <div class="container">
         <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-4">
             
              <?php if (isset($loginErrors['message'])) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $loginErrors['message']; ?>
                    </div>
                <?php }
                ?>
             
             <form id="loginForm" class="form-horizontal" method="POST">
                 <div class="" >
                     <div class="text-center" >
                      <br/> <img  src="/web/img/email.png"> <h4 >Logowanie</h4>
                     </div>
                      <div class="form-group">
                             <input type="text" class="form-control" name="login" id="inputLogin" placeholder="Login">
                         </div>
                         <div class="form-group">
                             <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Hasło">
                         </div>
                         <br/>
                         <button type ="submit" class ="btn btn-primary form-control">Zaloguj się</button> 
                              
                 </div>
             </form>
         </div>
     </div>
