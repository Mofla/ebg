<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(__('Supprimer ce Message'), ['action' => 'delete', $message->id], ['confirm' => __('Are you sure you want to delete # {0}?', $message->id)]) ?> </li>
        <li><?= $this->Html->link(__('Liste des Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nouveau Message'), ['action' => 'send']) ?> </li>
    </ul>
</nav>
<div class="messages view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($message->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('From User') ?></th>
            <td><?= $this->Number->format($message->from_user) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Contenu') ?></h4>
        <?= $this->Text->autoParagraph(h($message->text)); ?>
    </div>
</div>