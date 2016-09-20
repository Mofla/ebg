<?php foreach ($event->teams as $team): ?>
    <li class="list-group-item">
		<?= $this->Form->button($this->Html->icon('pencil'), ['escape' => false]) ?>
        <?=$team->name?>
        <?= $this->Html->badge( $this->Html->icon('user') . ' ' . count( $team->users ) . '/12' , ['escape' => false] ) ?>
        <?= $this->Html->badge( $this->Html->icon('briefcase') . ' Mat�riels ' . count( $team->materials ) , ['escape' => false] ) ?>
        <?= $this->Html->badge( $this->Html->icon('road') . ' V�hicules ' . count( $team->vehicles ) , ['escape' => false] ) ?>
    </li>
<?php endforeach; ?>