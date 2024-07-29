/* eslint-disable max-len */
import movileImg from '/img/movileImg.png'
import webImg from '/img/web.png'
import solutionImg from '/img/empresarial.png'
import systemImg from '/img/integracion.png'
import serv from './../css/services.module.css'

const Service = () => {
  return (
    <main className={serv.service}>
      <h2 className="text-center py-5" style={{ color: `rgb(9,9,121)` }}>
        <b>Nuestros Servicios</b>
      </h2>

      <section className={`${serv.movile} d-none d-sm-none d-md-block`}>
        <div className="d-flex justify-content-center justify-content-md-between align-items-center container px-5 pb-5 pb-md-0 px-md-0">
          <article className="d-flex justify-content-center align-items-end d-none d-md-block">
            <img src={movileImg} alt="" className={serv.movileImg} />
          </article>

          <article className="d-flex flex-column justify-content-center align-items-center align-items-md-start">
            <h3 className="text-center text-md-start mt-5">Desarrollo de Aplicaciones Móviles</h3>
            <p className="text-center text-md-start d-none d-sm-none d-md-block ">
              Creación de aplicaciones intuitivas y responsivas que ofrecen una experiencia de
              usuario excepcional en cualquier dispositivo.
            </p>
          </article>
        </div>
      </section>

      {/* mobile section */}
      <section
        className={`d-flex justify-content-center align-items-center d-sm-block d-md-none ${serv.movile_m}`}
      >
        <h3 className="text-center">Desarrollo de Aplicaciones Móviles</h3>
      </section>
      {/* fin mobile section */}

      <section className={`${serv.web} d-none d-sm-none d-md-block`}>
        <div className="d-flex justify-content-md-between align-items-center container py-5">
          <article className="d-flex flex-column justify-content-center align-items-center align-items-md-start px-5">
            <h3 className="text-white text-center text-md-start mt-5">Desarrollo Web</h3>
            <p className="text-white d-none d-sm-none d-md-block">
              Sitios web y aplicaciones web modernas, seguras y escalables que impulsan la presencia
              en línea de tu negocio.
            </p>
          </article>
          <article className="d-flex align-items-center justify-content-start ">
            <img src={webImg} alt="" />
          </article>
        </div>
      </section>

      {/* mobile section */}
      <section
        className={`d-flex justify-content-center align-items-center d-sm-block d-md-none ${serv.web_m}`}
      >
        <h3 className="text-center">Desarrollo Web</h3>
      </section>
      {/* fin mobile section */}

      <section className={`${serv.solution} d-none d-sm-none d-md-block`}>
        <div className="d-flex justify-content-md-between align-items-center container py-5">
          <article className="d-flex align-items-center justify-content-center d-none d-md-block">
            <img src={solutionImg} alt="" />
          </article>
          <article className="d-flex flex-column justify-content-center align-items-center align-items-md-start px-5">
            <h3>Soluciones Empresariales</h3>
            <p>
              Sistemas personalizados que optimizan los procesos de negocio, mejoran la
              productividad y fomentan el crecimiento.
            </p>
          </article>
        </div>
      </section>

      {/* mobile section */}
      <section
        className={`d-flex justify-content-center align-items-center d-sm-block d-md-none ${serv.solution_m}`}
      >
        <h3>Soluciones Empresariales</h3>
      </section>
      {/* fin mobile section */}

      <section className={`${serv.system} d-none d-sm-none d-md-block`}>
        <div className="d-flex justify-content-md-between align-items-center container">
          <article className="d-flex flex-column justify-content-center align-items-center align-items-md-start px-5 py-5 py-md-0">
            <h3 className="text-white text-sm-center">Integración de Sistemas</h3>
            <p className="text-white">
              Conectamos tus aplicaciones y sistemas existentes para crear un ecosistema tecnológico
              cohesivo y eficiente.
            </p>
          </article>
          <article className="d-flex align-items-center justify-content-center d-none d-sm-none d-md-block">
            <img src={systemImg} alt="" />
          </article>
        </div>
      </section>

      {/* mobile section */}
      <section
        className={`d-flex justify-content-center align-items-center d-sm-block d-md-none ${serv.system_m}`}
      >
        <h3>Integración de Sistemas</h3>
      </section>
      {/* fin mobile section */}
    </main>
  )
}

export default Service
