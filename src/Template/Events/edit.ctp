
<style>

  .grid-item { width:20%;
    margin:0px auto 0px auto;
    padding:10px;
  }
  .grid-item img{ width: 100%;  max-width: 100%; border: 3px solid white; display: none;}

  @media (max-width: 1200px) {
    .grid-item { width:25%;}
  }

  @media (max-width: 768px) {
    .grid-item { width:33.333333%;}
  }

  @media (max-width: 576px) {
    .grid-item { width:50%;}
  }
</style>

<?php $this->Html->script(['/libs/jquery.smart-wizard/js/jquery.smart-wizard.min.js'], ['block' => 'bottomScripts']) ?>
<?php $this->Html->script(['jquery.treeview-logger.js'], ['block' => 'bottomScripts']) ?>
<?php $this->Html->script(['jquery.treeview.js'], ['block' => 'bottomScripts']) ?>
<?php $this->Html->css(['/libs/jquery.smart-wizard/css/smart_wizard.css'], ['block' => 'css']) ?>
<?php $this->Html->css(['/libs/jquery.smart-wizard/css/smart_wizard_theme_arrows.css'], ['block' => 'css']) ?>
<style>
  #treeview-checkbox-demo span {
    margin-left: 12px;
  }

  .treeview {
    padding-left: 10px;
    padding-right: 20px;
  }
</style>
<div id="wizard">
    <h2>Event</h2>
    <section>
        <?= $this->Form->create($event, ['id' => 'event-form']) ?>
        <?= $this->Form->hidden('id') ?>
        <?= $this->Form->hidden('is_approved') ?>
        <input name="step" value="basic" type="hidden">
        <div class="form-group row">
            <?= $this->Form->label('parent', 'Parent Event', ['class' => 'col-sm-2 control-label'])?>
            <div class="col-sm-10">
                <div class="dropdown">
                    <button id="dLabel" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Choose Parent Event
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        <div id="parent-event" class="tree-event">
                            <ul>
                                <?php $this->Tree->toTreeAsCallback($events, ['exclude' => $event['id']], function($row, $deep, $index) {
                                ?>
                                <li data-value="<?= $row['id']?>"><span><?= $row['name']?></span>
                                    <?php })?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?=$this->Form->text('parent_id', ['class' => 'form-control d-none', 'autocomplete' => 'off']) ?>
            </div>
        </div>
        <div class="form-group row">
            <?= $this->Form->label('name', 'Name', ['class' => 'col-sm-2 control-label'])?>
            <div class="col-sm-10">
                <?= $this->Form->text('name', ['class' => 'form-control required', 'autocomplete' => 'off', 'required']) ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group row">
            <?= $this->Form->label('place', 'Place', ['class' => 'col-sm-2 control-label'])?>
            <div class="col-sm-10">
                <?= $this->Form->text('place', ['class' => 'form-control', 'autocomplete' => 'off', 'required']) ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group row">
            <?= $this->Form->label('price_group_id', 'Price Group', ['class' => 'col-sm-2 control-label'])?>
            <div class="col-sm-10">
                <?= $this->Form->select('price_group_id', $priceGroups, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) ?>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <?= $this->Form->label('started', 'Started', ['class' => 'col-sm-4 control-label'])?>
                    <div class="col-sm-8">
                        <?= $this->Form->text('started', ['class' => 'form-control form_datetime', 'autocomplete' => 'off', 'required']) ?>
                        <div class="help-block with-errors"></div>
                    </div>

                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <?= $this->Form->label('ended', 'Ended', ['class' => 'col-sm-4 control-label'])?>
                    <div class="col-sm-8">
                        <?= $this->Form->text('ended', ['class' => 'form-control form_datetime', 'autocomplete' => 'off', 'required']) ?>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <?= $this->Form->label('description', 'Description', ['class' => 'col-sm-2 control-label'])?>
            <div class="col-sm-10">
                <?= $this->Form->textarea('description', ['class' => 'form-control', 'autocomplete' => 'off', 'required']) ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <input type="hidden" name="is_share" value="0">
                <?= $this->Form->checkbox('is_share', ['value' => '1', 'hiddenField' => '0']);?> Share
            </div>
        </div>
        <!--<div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <?/*= $this->Form->label('team1', 'Team A', ['class' => 'col-sm-4 control-label'])*/?>
                    <div class="col-sm-8">
                        <?/*= $this->Form->text('team1', ['class' => 'form-control', 'autocomplete' => 'off', 'required']) */?>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <?/*= $this->Form->label('team2', 'Team B', ['class' => 'col-sm-4 control-label'])*/?>
                    <div class="col-sm-8">
                        <?/*= $this->Form->text('team2', ['class' => 'form-control', 'autocomplete' => 'off', 'required']) */?>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <?/*= $this->Form->label('division', 'Division', ['class' => 'col-sm-2 control-label'])*/?>
            <div class="col-sm-10">
                <?/*= $this->Form->text('division', ['class' => 'form-control', 'autocomplete' => 'off', 'required']) */?>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group row">
            <?/*= $this->Form->label('association', 'Association', ['class' => 'col-sm-2 control-label'])*/?>
            <div class="col-sm-10">
                <?/*= $this->Form->text('association', ['class' => 'form-control', 'autocomplete' => 'off', 'required']) */?>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group row">
            <?/*= $this->Form->label('gender', 'Gender', ['class' => 'col-sm-2 control-label'])*/?>
            <div class="col-sm-10">
                <?/*= $this->Form->text('gender', ['class' => 'form-control', 'autocomplete' => 'off', 'required']) */?>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group row">
            <?/*= $this->Form->label('field_num', 'Field Name', ['class' => 'col-sm-2 control-label'])*/?>
            <div class="col-sm-10">
                <?/*= $this->Form->text('field_num', ['class' => 'form-control', 'autocomplete' => 'off', 'required']) */?>
                <div class="help-block with-errors"></div>
            </div>
        </div>-->
        <?= $this->Form->end()?>
    </section>

    <h2>Upload Photos</h2>
    <section>
        <div class="bs-component">
            <ul class="nav nav-tabs nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Ftp Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile">Event Photos</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade show active" id="home">
                    <div class="clearfix row">
                        <div class="col-sm-10">
                            <div class="dropdown">
                                <button id="dLabel" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Choose Parent Event
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dLabel">
                                    <div id="ftp_folders" class="tree-event">
                                        <ul>
                                            <?php $this->Tree->toTreeAsCallback($ftps, ['key' => 'path'], function($row, $deep, $index) {
                                            ?>
                                            <li data-value="<?= $row['path']?>"><span><?= $row['name']?></span>
                                                <?php })?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?=$this->Form->text('parent_id', ['class' => 'form-control d-none', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-secondary float-right">Copy</button>
                            <button class="btn btn-secondary float-right">Delete</button>
                        </div>

                    </div>
                    <?php
                    $img = [$this->Url->image('sample0.jpg'), $this->Url->image('sample1.jpg')
                        , $this->Url->image('sample2.jpg'), $this->Url->image('sample3.jpg')
                        , $this->Url->image('sample4.jpg'), $this->Url->image('sample5.jpg')];
                    ?>
                    <div class="public-user-block block">
                        <div class="grid">
                            <?php
                            for($i = 0; $i < 10; $i++): $val = 'sample' . rand(0, 15) % 15 . '.jpg';$val = rand(0, 6) % 6;
                                $url = $this->Url->build(["controller" => "Events","action" => "popup_ftp_photo", "?" => ["photo" => $this->Url->image($img[$val]. '?t=' . microtime())]]);
                                ?>
                                <div class="grid-item" style="min-width: 200px;min-height: 200px;" href="<?= $url?>">
                                    <img href="#" data-src="<?= $this->Url->image($img[$val]. '?t=' . microtime())?>">
                                </div>
                            <?php endfor;?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile">
                    <div class="clearfix">
                        <button class="btn btn-secondary float-right">Copy</button>
                        <button class="btn btn-secondary float-right">Delete</button>
                    </div>
                    <?php
                    $img = [$this->Url->image('sample0.jpg'), $this->Url->image('sample1.jpg')
                        , $this->Url->image('sample2.jpg'), $this->Url->image('sample3.jpg')
                        , $this->Url->image('sample4.jpg'), $this->Url->image('sample5.jpg')];
                    ?>
                    <div class="public-user-block block">
                        <div class="grid">
                            <?php
                            for($i = 0; $i < 10; $i++): $val = 'sample' . rand(0, 15) % 15 . '.jpg';$val = rand(0, 6) % 6;
                                $url = $this->Url->build(["controller" => "Events","action" => "popup_event_photo", "?" => ["photo" => $this->Url->image($img[$val]. '?t=' . microtime())]]);
                                ?>
                                <div class="grid-item" style="min-width: 200px;min-height: 200px;" href="<?= $url?>">
                                    <img href="#" data-src="<?= $this->Url->image($img[$val]. '?t=' . microtime())?>">
                                </div>
                            <?php endfor;?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <h2>Ads</h2>
    <section>
        <div class="row">
            <div class="col-lg-6">
                <div class="checklist-block block">
                    <div class="title"><strong>Advertising Banners</strong></div>
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="banner-el">
                            <img src="" height="100" width="100">
                            <div class="form-group">
                                <?= $this->Form->text('banner1_img_url', ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Banner Image Url']) ?>
                                <br />
                                <?= $this->Form->text('banner1_url', ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Advertising Url']) ?>
                            </div>
                        </div>
                    <?php endfor;?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="messages-block block">
                    <div class="title"><strong>Click Through Advertising</strong></div>
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="banner-el banner-click">
                            <img src="" height="100" width="100">
                            <div class="form-group">
                                <?= $this->Form->text('click_img_url', ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Banner Image Url']) ?>
                                <?= $this->Form->text('click_url', ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Advertising Url']) ?>
                                <?= $this->Form->text('hover_text', ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Hover Text']) ?>
                            </div>
                        </div>
                    <?php endfor;?>
                </div>
            </div>
        </div>
    </section>
    <h2>Account</h2>
    <section>
        <div class="form-group row">
            <?= $this->Form->label('username', 'User Name', ['class' => 'col-sm-2 control-label'])?>
            <div class="col-sm-10">
                <?= $this->Form->text('username', ['class' => 'form-control', 'autocomplete' => 'off']) ?>
            </div>
        </div>
        <div class="form-group row">
            <?= $this->Form->label('password', 'Password', ['class' => 'col-sm-2 control-label'])?>
            <div class="col-sm-10">
                <?= $this->Form->text('password', ['class' => 'form-control', 'autocomplete' => 'off']) ?>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {

        var form = null;
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            enableAllSteps: true,
            enablePagination: true,
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                if(currentIndex == 0) {
                    form.validate().settings.ignore = ":disabled,:hidden";
                    if(form.valid()) {
                        form.find('input[name=parent_id]').val($('#parent-event input:checked').val() || '');
                        var data = getFormDataAsJson(form);
                        $.ajax({
                            method: "POST",
                            url: "<?= $this->Url->build(['controller' => 'events', 'action' => 'save'])?>",
                            data: data,
                        })
                        .done(function( msg ) {
                        });
                        return true;
                    }
                    return false;
                } else {
                    return true;
                }
            }
        });

        form = $("#event-form");
        form.validate();


//        $('#smartwizard').smartWizard({
//            selected: 0,
//            theme: 'default',
//            transitionEffect:'fade',
//            showStepURLhash: true,
//            toolbarSettings: {toolbarPosition: 'bottom',
//                toolbarButtonPosition: 'end',
//                /*toolbarExtraButtons: [btnFinish, btnCancel]*/
//            }
//        });



//        var isLeaveOk = false;
//        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
//            console.log(e);
//            var elmForm = $("#step-" + (stepNumber + 1));
//            if(stepNumber == 0) {
//                // parent id setting:
//                elmForm.find('input[name=parent_id]').val($('#parent-event input:checked').val() || '');
//            }
//
//            if(stepDirection === 'forward' && elmForm){
//
//                elmForm.validator('validate');
//                var elmErr = elmForm.children('.has-error');
//                if(elmErr && elmErr.length > 0){
//                    // Form validation failed
//                    return false;
//                } else {
//
//                    if(isLeaveOk) {
//                        isLeaveOk = false;
//                        return true;
//
//                    }
//
//                    var url = "<?//= $this->Url->build(['controller' => 'events', 'action' => 'save'])?>//";
//
//                    var data = getFormDataAsJson(elmForm.find('form'));
//                    $.ajax({
//                        method: "POST",
//                        url: "<?//= $this->Url->build(['controller' => 'events', 'action' => 'save'])?>//",
//                        data: data,
//                    })
//                        .done(function( msg ) {
//                            alert( "Data Saved: " + msg );
//                            isLeaveOk = true;
//                            $("#smartwizard").data('smartWizard').next();
//                            isLeaveOk = false;
//
//                        });
//
//                    return false;
//                }
//            }
//            return true;
//        });


        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('.grid').masonry({
                itemSelector: '.grid-item',
                percentPosition: true
            });
        });

        /*$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
            if(stepNumber ==2 ) {
                $('#step-3').show();
                $('.grid').masonry({
                    itemSelector: '.grid-item',
                    percentPosition: true
                });
            }
        });*/
        $('#parent-event').treeview({
            debug : true,
            isSingle: true,
            data : ['<?= $event->parent_id?>']
        });

        $('#ftp_folders').treeview({
            debug : true,
            isSingle: false,
        });



        $('.tree-event').click(function(e) {
           e.stopPropagation();
           return true;
        });

        var index = 0;

        $('.grid-item img').lazy({
            effect: "fadeIn",
            effectTime: 2000,
            threshold: 30,
            afterLoad: function(element) {
                $(element).next().hide();
                $(element).parent().addClass('loaded');
                index++;
                if(index % 10 == 0)
                {
                    $('.grid-item.loaded').css('min-width', '');
                    $('.grid-item.loaded').css('min-height', '');
                    $('.grid').masonry({
                        itemSelector: '.grid-item',
                        percentPosition: true
                    });
                }

            },
            onFinishedAll: function() {
                var $container = $('.grid');
                $('.grid-item').css('min-width', '');
                $('.grid-item').css('min-height', '');
                $container.masonry({
                    itemSelector: '.grid-item',
                    percentPosition: true
                });

                $("[data-loader='rectangle']").hide();
            }
        });



        $('.grid').magnificPopup({
            delegate: 'div.grid-item',
            type: 'ajax',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            gallery: {
                enabled: true
            }
        });

        $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

    });
</script>