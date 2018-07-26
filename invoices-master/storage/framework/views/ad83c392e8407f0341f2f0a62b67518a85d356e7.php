 

 <?php $__env->startSection('login_body'); ?>

 <div class="second">
 
                                          <div class="form">
                                          
                                          <form id="form" class="login-form" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                                          <?php echo e(csrf_field()); ?>

                                              <input  type="email" class="box" placeholder="EMAIL" name="email"  required="required"/>

                                              <input  type="password" class="box" placeholder="PASSWORD" name="password" />
                                              <div class="keep_me"><label class="checklabel"><input class="check" type="checkbox" value="" name="remember">Keep me signed in.</label></div>
                                              <?php if($errors->has('email')): ?>
                                    <span class="help-block" style="margin-top:30px;">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                              
                                          
                                        </div>

                            		</div>
                                    
									<div class="third">
                                    <div class="forgot" <?php if($errors->has('email')): ?> style="margin-top:50px !important;" <?php endif; ?>  ><a class="for-pass" href="/login?reset">Forgot password?</a></div>

                                             <div  class="login-button" <?php if($errors->has('email')): ?> style="margin-top:90px !important;" <?php endif; ?>   >  <button id="login_button" type="submit" class="btnn">LOGIN</button></div>
                                              </form>
                  </div>

<?php $__env->stopSection(); ?>                  
<?php echo $__env->make('auth.welcome_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>