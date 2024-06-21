import team from "./img/team_2.png";
const Index = () => {
  return (
    <>
      <header className="cabecera">
        <nav className="navbar navbar-expand-lg bg-transparent container">
          <div className="container-fluid">
            <a className="navbar-brand text-white" href="#">
              <b>SysifosWeb</b>
            </a>
            <button
              className="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span className="navbar-toggler-icon text-white"></span>
            </button>
            <div
              className="collapse navbar-collapse"
              id="navbarSupportedContent"
            >
              <ul className="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li className="nav-item">
                  <a
                    className="nav-link active text-white"
                    aria-current="page"
                    href="#"
                  >
                    Home
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link text-white" href="#">
                    Nosotros
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link text-white" href="#">
                    Contacto
                  </a>
                </li>

                {/* <li className="nav-item">
                  <a className="nav-link text-white"></a>
                </li> */}
              </ul>
              <span className="navbar-text text-white">+56949109970</span>
              <button className="btn btn-info text-white ms-4">
                Contactanos
              </button>
            </div>
          </div>
        </nav>
        <section
          id="banner"
          className="d-flex justify-content-between container"
        >
          <article
            id="welcome"
            className="d-flex flex-column justify-content-center text-white mt-5 p-2 col-6"
          >
            <h1 className="display-4">Excelencia en Ingeniería</h1>
            <p className="display-6">Y pasión por la tecnología!</p>
            <p>
              En <b>SysifosWeb</b>, ofrecemos software a medida que no solo
              cumple, sino que supera expectativas
            </p>
          </article>

          <article
            id="welcome-img"
            className="d-flex flex-column justify-content-center text-white mt-5 col-5"
          >
            <img src={team} alt="" />
          </article>
        </section>
      </header>
    </>
  );
};

export default Index;
