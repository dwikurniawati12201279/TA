  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="javasript:;" class="brand-link" style="text-align: center;">
          <span class="brand-text font-weight-light" style="font-weight: bold !important;font-size: 20px">Sekolah</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name}}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


              @if (Auth::user()->user_type == 1)
              <li class="nav-item">
                <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ url('admin/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Akun Saya
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Admin
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/teacher/list') }}" class="nav-link @if(Request::segment(2) == 'teacher') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Teacher
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/student/list') }}" class="nav-link @if(Request::segment(2) == 'student') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                  Student
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/parent/list') }}" class="nav-link @if(Request::segment(2) == 'parent') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                  Parent
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/class/list') }}" class="nav-link @if(Request::segment(2) == 'class') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Class
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/subject/list') }}" class="nav-link @if(Request::segment(2) == 'subject') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Subject
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/assign_subject/list') }}" class="nav-link @if(Request::segment(2) == 'assign_subject') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Assign Subject
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/assign_class_teacher/list') }}" class="nav-link @if(Request::segment(2) == 'assign_class_teacher') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Assign Class Teacher
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/class_timetable/list') }}" class="nav-link @if(Request::segment(2) == 'class_timetable') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Class Timetable
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/attendance/student') }}" class="nav-link @if(Request::segment(2) == 'student') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Student Attendance
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Change Password
                  </p>
                </a>
              </li>

              @elseif (Auth::user()->user_type == 2) 
              <li class="nav-item">
              <a href="{{ url('teacher/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('teacher/my_student') }}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                 My Student
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('teacher/my_class_subject') }}" class="nav-link @if(Request::segment(2) == 'my_class_subject') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                 My Class & Subject
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('teacher/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                 My Account
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('teacher/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                 Change Password
                </p>
              </a>
            </li>

              @elseif (Auth::user()->user_type == 3) 
              <li class="nav-item">
                <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('student/my_subject') }}" class="nav-link @if(Request::segment(2) == 'my_subject') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   My Subject
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('student/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   My Account
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('student/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Change Password
                  </p>
                </a>
              </li>
            

              @elseif (Auth::user()->user_type == 4) 
              <li class="nav-item">
                <a href="{{ url('parent/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{ url('parent/my_student') }}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   My Student
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('parent/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   My Account
                  </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ url('parent/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                   Change Password
                  </p>
                </a>
              </li>
              @endif

              <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                  Logout
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

