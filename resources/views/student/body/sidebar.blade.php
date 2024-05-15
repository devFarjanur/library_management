
<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          single<span>Vendor</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              
              <span class="link-title">Dashboard</span>
            </a>
          </li>
        


          <li class="nav-item">
            <a href="{{ route('admin.book') }}" class="nav-link">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Books</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#order" role="button" aria-expanded="false" aria-controls="order">
              <i class="link-icon" data-feather="alert-circle"></i>
              <span class="link-title">Issue Book</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/apps/chat.html" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">Message</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Calendar</span>
            </a>
          </li>
          
        </ul>
      </div>
    </nav>