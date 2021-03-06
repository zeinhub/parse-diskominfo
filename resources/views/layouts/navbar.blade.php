<div class="navbar-line"></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">PR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('statistic')}}">Statistik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('filter')}}">Filter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Upload
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <div class="dropdown-item">
                  <a class="nav-link" href="{{route('upload-data')}}">Upload Data</a>
                </div>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <div class="dropdown-item">
                  <a class="nav-link" href="{{route('upload-file')}}">Upload Dokumentasi</a>
                </div>
              </li>
              <li><hr class="dropdown-divider"></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex nav-search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
      </div>
    </div>
</nav>