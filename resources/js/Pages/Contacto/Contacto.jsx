import Header from "./../HeaderPages";
// import Contact from "./../Contact";
import Footer from "./../Footer";
import { Head } from "@inertiajs/react";
import { SendTwoTone } from "@mui/icons-material";
import "./../../../css/main.css";
import contact from "./../../../css/contacto.module.css";

const Contacto = () => {
    return (
        <>
            <Head>
                <title>Contacto - Sysifos Web</title>
                <meta name="description" content="pagina de nosotros" />
            </Head>
            <Header title={"Contactanos!"} />
            <main>
                <section className="container">
                    <div className="row">
                        <div
                            className={`${contact.fondo} d-flex flex-row justify-content-between`}
                        >
                            <div className="info"></div>
                            <div
                                className={`${contact.form_container} col-md-6 d-flex align-items-center justify-content-center`}
                            >
                                <div
                                    className={`${contact.form_contact} shadow d-flex flex-column align-items-center justify-content-center gap-2 px-5`}
                                >
                                    <h4>Envianos un mensaje</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Dolor, omnis?
                                    </p>
                                    <div class="col-12">
                                        <label
                                            for="name"
                                            className="col-form-label-sm"
                                        >
                                            Nombre
                                        </label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="name"
                                        />
                                    </div>
                                    <div class="col-12">
                                        <label
                                            for="mail"
                                            className="col-form-label-sm"
                                        >
                                            Correo
                                        </label>
                                        <input
                                            type="email"
                                            className="form-control"
                                            id="mail"
                                        />
                                    </div>
                                    <div class="col-12">
                                        <label
                                            for="message"
                                            className="col-form-label-sm"
                                        >
                                            Mensaje
                                        </label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="message"
                                        />
                                    </div>
                                    <button className="btn btn-primary">
                                        <SendTwoTone
                                            fontSize="medium"
                                            sx={{ mr: 1, my: 0.1 }}
                                        />
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            {/* <Contact /> */}
            <Footer />
        </>
    );
};

export default Contacto;
