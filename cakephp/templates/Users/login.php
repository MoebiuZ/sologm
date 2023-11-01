<div class="row">
    <div class="mx-auto col-auto">


<?= $this->Flash->render() ?>

<div class="card" > <!--style="max-width: 450px;">-->
    
    <div class="card-header">
        <h3 class="card-title"><?= __('Sign in') ?></h3>
    </div>
    <div class="card-body ">
        <?= $this->Form->create() ?>
        <fieldset>
            <div class="input-group mb-3">
                <?= $this->Form->text('email', ['required' => true, 'class' => 'form-control', 'placeholder' => 'email']) ?>
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
            <div class="form-check form-switch">
                <?= $this->Form->checkbox('remember_me', ['type' => 'checkbox', 'class' => 'form-check-input']) ?>
                <?= $this->Form->label('remember_me', __("Remember me"), ['class' => 'form-check.label']); ?>
            </div>
               
        </fieldset>
        <?= $this->Form->submit(__('Login'), array('class' => 'btn btn-primary btn-block')); ?>
        <?= $this->Form->end() ?>

        <?= $this->Html->link(__("Sign up"), ['action' => 'signup']) ?>

    </div>
</div>

</div>
</div>