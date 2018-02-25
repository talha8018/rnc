<div class="page-sidebar">
                <a class="logo-box" href="{{url('/')}}">
                    <span>RNC</span>
                    <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
                    <i class="icon-close" id="sidebar-toggle-button-close"></i>
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            <li>
                                <a href="javascript:void(0);"   class="<?php if(Request::segment(1)=='challan'){ echo 'selected-tab '; } ?>">
                                    <i class="menu-icon fa fa-file-excel-o"></i><span>Challan</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu" style="display:block;">
                                    <li><a href="{{url('challan/file-upload')}}" class="<?php if(Request::segment(2)=='file-upload'){ echo 'active'; } ?>">File Upload</a></li>
                                    <li><a href="{{url('challan/student-list')}}"  class="<?php if(Request::segment(2)=='student-list'){ echo 'active'; } ?>">Generate Challan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->