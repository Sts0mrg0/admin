<?php namespace Flextype ?>
<?php use Flextype\Component\{Http\Http, Registry\Registry, Filesystem\Filesystem, Token\Token, Text\Text} ?>
<?php use function Flextype\Component\I18n\__; ?>
<?php Themes::view('admin/views/partials/head')->display() ?>
<?php Themes::view('admin/views/partials/navbar')
    ->assign('links',   [
                            'templates' => [
                                            'link' => Http::getBaseUrl() . '/admin/templates',
                                            'title' => __('admin_templates'),
                                            'attributes' => ['class' => 'navbar-item active']
                                       ]
                        ])
    ->assign('buttons', [
                            'entries' => [
                                            'link' => Http::getBaseUrl() . '/admin/templates/add',
                                            'title' => __('admin_create_new_template'),
                                            'attributes' => ['class' => 'float-right btn']
                                       ]
                        ])
    ->display()
?>
<?php Themes::view('admin/views/partials/content-start')->display() ?>

<?php if (count($templates_list) > 0): ?>
<table class="table no-margin">
    <thead>
        <tr>
            <th><?= __('admin_entries_name') ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($templates_list as $template): ?>
        <tr>
            <td>
                <?= $template ?>
            </td>
            <td class="text-right">
                <div class="btn-group">
                  <a class="btn btn-default" href="<?= Http::getBaseUrl() ?>/admin/templates/edit?template=<?= $template ?>"><?= __('admin_entries_edit') ?></a>
                  <button type="button" class="btn btn-default dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= Http::getBaseUrl() ?>/admin/templates/rename?template=<?= $template ?>"><?= __('admin_entries_rename') ?></a>
                    <a class="dropdown-item" href="<?= Http::getBaseUrl() ?>/admin/templates/duplicate?template=<?= $template ?>&token=<?= Token::generate() ?>"><?= __('admin_entries_clone') ?></a>
                  </div>
                </div>
                <a class="btn btn-default" href="<?= Http::getBaseUrl() ?>/admin/templates/delete?template=<?= $template ?>&token=<?= Token::generate() ?>"><?= __('admin_entries_delete') ?></a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<?php else: ?>

<?php endif ?>

<?php Themes::view('admin/views/partials/content-end')->display() ?>
<?php Themes::view('admin/views/partials/footer')->display() ?>
