<div class="row">
<div class="mx-auto col-auto">

<div class="card">


   <!-- <div class="users form"> -->
        <?= $this->Flash->render() ?>
        <div class="card-header">

        <h3 class="card-title">Login</h3>
</div>
<div class="card-body">
        <?= $this->Form->create() ?>
        <fieldset>
            <div class="form-group">
            <?= $this->Form->label(__("Email")) ?>
            <?= $this->Form->text('email', ['required' => true, 'class' => 'form-control']) ?>

            <div class="form-group">
            <?= $this->Form->label(__("Password")) ?>
            <?= $this->Form->password('password', ['required' => true, 'class' => 'form-control']) ?>

            <div class="form-group">
            <?= $this->Form->checkbox('remember_me', ['type' => 'checkbox', 'class' => 'form-check-input']); ?>
            <?= $this->Form->label(__("Remember me")) ?>
            <div class="form-group">
        </fieldset>
        <?= $this->Form->submit(__('Login')); ?>
        <?= $this->Form->end() ?>

        <?= $this->Html->link(__("Sign up"), ['action' => 'signup']) ?>
    <!--</div>-->
</div>
</div>

</div>
</div>