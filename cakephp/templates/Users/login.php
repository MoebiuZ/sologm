<div class="row">
    <div class="mx-auto col-auto">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="row">
    <div class="mx-auto col-auto">
        <div class="card card-dark" style="max-width: 350px;">
 
            <div class="card-header">
                <h3 class="card-title"><?= __('Sign in') ?></h3>
            </div>
            <div class="card-body">
                <?= $this->Form->create(null, ['url' => '/users/login']) ?>
                <fieldset>
                    <div class="input-group mb-3">
                        <?= $this->Form->email('email', ['required' => true, 'class' => 'form-control', 'placeholder' => 'email']) ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <?= $this->Form->password('password', ['required' => true, 'class' => 'form-control', 'placeholder' => 'password']) ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <?= $this->Form->checkbox('remember_me', ['class' => 'custom-control-input', 'id' => 'remembermeSwitch']) ?>
                        <?= $this->Form->label('remember_me', __("Remember me"), ['class' => 'custom-control-label', 'for' => 'remembermeSwitch']); ?>
                    </div>
                    
                </fieldset>
                <?= $this->Form->submit(__('Login'), array('class' => 'btn btn-primary btn-block')); ?>
                <?= $this->Form->end() ?>

                <?= $this->Html->link(__("Create an account"), ['action' => 'signup'], ['class' => 'btn btn-secondary btn-sm mt-2']) ?>

            </div>
        </div>
    </div>
</div>