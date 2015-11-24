<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Settings tab content -->
        <div class="tab-pane active">

            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle btn-block btn-sm bg-maroon" data-toggle="dropdown">Language
                        <span class="fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu">
                        <li class="{!! $locale !== 'en' ?: 'active' !!}">
                            <a href="{!! route('admin.set_language', ['lang' => 'en']) !!}"> English {!! $locale !== 'en' ? '': '<i class="fa fa-check"></i>'!!}</a>
                        </li>
                        <li class="{!! $locale !== 'gr' ?: 'active' !!}">
                            <a href="{!! route('admin.set_language', ['lang' => 'gr']) !!}"> Greek {!! $locale !== 'gr' ? '' : '<i class="fa fa-check"></i>'!!}</a>
                        </li>
                        <li class="{!! $locale !== 'de' ?: 'active' !!}">
                            <a href="{!! route('admin.set_language', ['lang' => 'de']) !!}"> German {!! $locale !== 'de' ? '': '<i class="fa fa-check"></i>'!!}</a>
                        </li>
                    </ul>
                </div><!-- /btn-group -->
            </div><!-- /btn-group -->

            <div class="form-group">
                <label class="control-sidebar-subheading"> Allow mail redirect
                    <input type="checkbox" class="pull-right" checked> </label>
                <p>
                    Other sets of options are available
                </p>
            </div><!-- /.form-group -->

            <div class="form-group">
                <label class="control-sidebar-subheading"> Expose author name in posts
                    <input type="checkbox" class="pull-right" checked> </label>
                <p>
                    Allow the user to show his name in blog posts
                </p>
            </div><!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
                <label class="control-sidebar-subheading"> Show me as online
                    <input type="checkbox" class="pull-right" checked> </label>
            </div><!-- /.form-group -->

            <div class="form-group">
                <label class="control-sidebar-subheading"> Turn off notifications
                    <input type="checkbox" class="pull-right"> </label>
            </div><!-- /.form-group -->

            <div class="form-group">
                <label class="control-sidebar-subheading"> Delete chat history
                    <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a> </label>
            </div><!-- /.form-group -->

        </div><!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

