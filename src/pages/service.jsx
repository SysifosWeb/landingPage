import movile_img from "./../img/movile_img.png";
import web_img from "./../img/web.png";
import solution_img from "./../img/empresarial.png";
import system_img from "./../img/integracion.png";

const Service = () => {
  return (
    <main className="service">
      <h2 className="text-center py-5" style={{ color: "rgb(9,9,121)" }}>
        <b>Nuestros Servicios</b>
      </h2>

      <section id="movile" className="d-flex justify-content-between container">
        <article className="d-flex justify-content-center align-items-end">
          <img src={movile_img} alt="" />
        </article>

        <article className="d-flex flex-column justify-content-center align-items-start">
          <h3>Desarrollo de Aplicaciones Móviles</h3>
          <p>
            Creación de aplicaciones intuitivas y responsivas que ofrecen una
            experiencia de usuario excepcional en cualquier dispositivo.
          </p>
        </article>
      </section>

      <section id="web">
        <div className="d-flex justify-content-between align-items-center container">
          <article className="d-flex flex-column justify-content-center align-items-start px-5">
            <h3 className="text-white">Desarrollo Web</h3>
            <p className="text-white">
              Sitios web y aplicaciones web modernas, seguras y escalables que
              impulsan la presencia en línea de tu negocio.
            </p>
          </article>
          <article className="d-flex align-items-center justify-content-start">
            <img src={web_img} alt="" />
          </article>
        </div>
      </section>

      <section
        id="solution"
        className="d-flex justify-content-between align-items-center container"
      >
        <article className="d-flex align-items-center justify-content-center">
          <img src={solution_img} alt="" />
        </article>
        <article className="d-flex flex-column justify-content-center align-items-start px-5">
          <h3>Soluciones Empresariales</h3>
          <p>
            Sistemas personalizados que optimizan los procesos de negocio,
            mejoran la productividad y fomentan el crecimiento.
          </p>
        </article>
      </section>

      <section id="system">
        <div className="d-flex justify-content-between align-items-center container">
          <article className="d-flex flex-column justify-content-center align-items-start px-5">
            <h3 className="text-white">Integración de Sistemas</h3>
            <p className="text-white">
              Conectamos tus aplicaciones y sistemas existentes para crear un
              ecosistema tecnológico cohesivo y eficiente.
            </p>
          </article>
          <article className="d-flex align-items-center justify-content-center">
            <img src={system_img} alt="" />
          </article>
        </div>
      </section>
    </main>
  );
};

export default Service;
