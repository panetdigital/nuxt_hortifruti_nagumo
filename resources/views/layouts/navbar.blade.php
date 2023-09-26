<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    

    <ul class="navbar-nav">
              
          <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"
                                    >
                    <i class="fas fa-bars"></i>
                    <span class="sr-only">Trocar navegação</span>
                </a>
            </li>
         
      </ul>

          
      <ul class="navbar-nav ml-auto">
              
              
              
        <li class="nav-item">

          
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
          </a>

          
          <div class="navbar-search-block">
              <form class="form-inline" action="{{ route('lista-produtos') }}" method="GET">
                  <input type="hidden" name="_token" value="tPbwU2nwmX3ky8H6zSK2QKJh6dvM2AENurZUaFE8">

                  <div class="input-group">

                      
                      <input class="form-control form-control-navbar" type="search"
                                              name="filternomeprd"
                          placeholder="pesquisar..."
                          aria-label="filtra">

                      
                      <div class="input-group-append">
                          <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                          </button>
                          <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                              <i class="fas fa-times"></i>
                          </button>
                      </div>

                  </div>
              </form>
          </div>

      </li>

      <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
          </a>
      </li>


              
      <li class="nav-item">
          <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-fw fa-power-off text-red"></i>
              Sair
          </a>
          <form id="logout-form" action="https://nagumo.marketingonline.click/public/" method="" style="display: none;">
                      
          </form>
      </li>                    
        
      </ul>
  </nav>