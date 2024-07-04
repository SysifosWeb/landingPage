import movile from "./../img/movile.jpg";
const Service = () => {
  return (
    <section className="service container">
      <h2 className="text-center py-5" style={{ color: "rgb(9,9,121)" }}>
        <b>Nuestros Servicios</b>
      </h2>

      <div
        id="tarjetas"
        className="d-flex justify-content-center flex-wrap gap-5 row-gap-5 column-gap-5"
      >
        <div className="tarjeta">
          <img src={movile} alt="" />
          <p>
            Creación de aplicaciones intuitivas y responsivas que ofrecen una
            experiencia de usuario excepcional en cualquier dispositivo.
          </p>
        </div>

        <div className="tarjeta">
          <img src={movile} alt="" />
          <p>
            Sitios web y aplicaciones web modernas, seguras y escalables que
            impulsan la presencia en línea de tu negocio.
          </p>
        </div>

        <div className="tarjeta">
          <img src={movile} alt="" />
          <p>
            Sistemas personalizados que optimizan los procesos de negocio,
            mejoran la productividad y fomentan el crecimiento.
          </p>
        </div>

        <div className="tarjeta">
          <img src={movile} alt="" />
          <p>
            Conectamos tus aplicaciones y sistemas existentes para crear un
            ecosistema tecnológico cohesivo y eficiente.
          </p>
        </div>
      </div>
    </section>
  );
};

export default Service;
