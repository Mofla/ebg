<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $providersSupply->provider_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $providersSupply->provider_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Providers Supplies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplies'), ['controller' => 'Supplies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supply'), ['controller' => 'Supplies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="providersSupplies form large-9 medium-8 columns content">
    <?= $this->Form->create($providersSupply) ?>
    <fieldset>
        <legend><?= __('Edit Providers Supply') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
