<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Login | Sign Up</h4>
            </div>

            <div class="modal-body">
                <!--Tabs -->
                <div role="tabpanel">


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a>
                        </li>
                        <li role="presentation"><a href="#signUp" aria-controls="sign up" role="tab" data-toggle="tab">Sign Up</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="login">
                            <?php include( 'loginform.php'); ?> <!-- login form -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="signUp">
                            <?php include( 'signup.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>