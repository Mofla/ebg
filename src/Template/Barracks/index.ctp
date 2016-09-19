<div class='col-md-2'>
    <div class="sidebar-nav linkout">
        <div class="navbar navbar-default" role="navigation">

            <ul class="nav nav-pills nav-stacked">
                <li class="active" ><a href="javascript:;"> Afficher par
                </a>
                </li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'index']); ?>">Arborescence</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'annuaire']); ?>">Liste </a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'carte']); ?>">Carte</a></li>
            </ul>
        </div>
    </div>

    <div class="sidebar-nav linkout">
        <div class="navbar navbar-default" role="navigation">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"  ><a href="javascript:;"> Trier par
                </a>
                </li>
                <li id="bttoopen"><a href="javascript:;">*****</a></li>
                <li id="bttoclose"><a href="javascript:;">*******</a></li>
            </ul>
        </div>
    </div>
</div>

<div class='col-md-10'>

    <div class="panel panel-primary">
        <div class="panel-heading"><?= __('Vue arborescente des Casernes') ?>
        </div>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('caserne') ?></th>
				<th><?= h('Informations') ?></th>
                <th><?= h('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach( $barracks as $id => $barrack ) { ?>
    <?php $name = str_replace( '_' , '---' , $barracks_tree[ $barrack->id ] ); ?>
            <tr>
                <td><?= $name ?></td>
				<td>
                	<?php
						echo $this->Html->badge( $this->Html->icon('user') . ' ' . count( $barrack->users ) , ['escape' => false]) ;
						echo $this->Html->badge( $this->Html->icon('briefcase') . ' ' . count( $barrack->material_stocks ) , ['escape' => false] ) ;
                    echo $this->Html->badge( $this->Html->icon('road') . ' ' . count( $barrack->vehicles ) , ['escape' => false] ) ;

                    ?>
                </td>
                <td>                <a href="<?= $this->Url->build(['controller' => 'barracks','action' => 'view' , $barrack->id]); ?>" class="btn btn-default  btn-sm" ><i class="glyphicon glyphicon-eye-open"></i></a>
                </td>
            </tr>		
	<?php }	?>
    	</tbody>
    </table>
</div>
