import Header from "./../HeaderPages";
import { useState } from "react";
import Footer from "./../Footer";
import { Head, router } from "@inertiajs/react";
import {
    SendTwoTone,
    Mail,
    AccessTime,
    PhoneInTalk,
} from "@mui/icons-material";
import "./../../../css/main.css";
import contact from "./../../../css/contacto.module.css";

const Contacto = () => {
    const [values, setValues] = useState({
        name: "",
        email: "",
        message: "",
    });
    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value;
        setValues((values) => ({
            ...values,
            [key]: value,
        }));
    }
    function handleSubmit(e) {
        e.preventDefault();
        router.post("/customer", values);
    }

    return (
        <>
            <Head>
                <title>Contacto | Sysifos Web</title>
                <meta name="description" content="pagina de contactos" />
            </Head>
            <Header title={"Contactanos!"} />
            <main>
                <section className="container">
                    <div className="row">
                        <div
                            className={`${contact.fondo} d-flex flex-row justify-content-between`}
                        >
                            <div
                                className={`${contact.info} col-md-6 d-flex align-items-center justify-content-center`}
                            >
                                <div className={`${contact.info_data}`}>
                                    <h4>Agendemos una cita</h4>
                                    <p>
                                        Conozcamosnos más y agendemos una
                                        reunión, para analizar las necesidades y
                                        empezar luego en esa super idea.Puedes
                                        llamarnos o bien escribirnos a nuestro
                                        correo en el el horario de atención:
                                    </p>
                                    <div
                                        className={`${contact.cards_} d-flex align-content-center flex-wrap mt-2 gap-5`}
                                    >
                                        <div className={`${contact.card_}`}>
                                            <Mail
                                                fontSize="large"
                                                sx={{ mr: 1, my: 0.1 }}
                                            />
                                            <h5>CORREO</h5>
                                            <p>contacto@sysifosweb.cl</p>
                                        </div>
                                        <div className={`${contact.card_}`}>
                                            <AccessTime
                                                fontSize="large"
                                                sx={{ mr: 1, my: 0.1 }}
                                            />
                                            <h5>HORARIO DE ATENCIÓN</h5>
                                            <p>
                                                Lunes a Viernes : 9am a 7pm{" "}
                                                <br />
                                                Sábados y Domingos : Cerrado
                                            </p>
                                        </div>
                                        <div className={`${contact.card_}`}>
                                            <PhoneInTalk
                                                fontSize="large"
                                                sx={{ mr: 1, my: 0.1 }}
                                            />
                                            <h5>TELEFONO</h5>
                                            <p>+569 49109970</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                className={`${contact.form_container} col-md-6 d-flex align-items-center justify-content-center`}
                            >
                                <form
                                    className={`${contact.form_contact} shadow d-flex flex-column align-items-center justify-content-center gap-2 px-5`}
                                    onSubmit={handleSubmit}
                                >
                                    <h4 className="text-center">
                                        Envianos un mensaje
                                    </h4>
                                    <p>
                                        Escribenos y conversemos sobre aquel
                                        proyecto que ronda en tu cabeza para ser
                                        tu aliado digital.
                                    </p>
                                    <div className="col-12">
                                        <label
                                            htmlFor="name"
                                            className="col-form-label-sm"
                                        >
                                            Nombre
                                        </label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="name"
                                            value={values.name}
                                            onChange={handleChange}
                                        />
                                    </div>
                                    <div className="col-12">
                                        <label
                                            htmlFor="mail"
                                            className="col-form-label-sm"
                                        >
                                            Correo
                                        </label>
                                        <input
                                            type="email"
                                            className="form-control"
                                            id="email"
                                            value={values.email}
                                            onChange={handleChange}
                                        />
                                    </div>
                                    <div className="col-12">
                                        <label
                                            htmlFor="message"
                                            className="col-form-label-sm"
                                        >
                                            Mensaje
                                        </label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="message"
                                            value={values.message}
                                            onChange={handleChange}
                                        />
                                    </div>
                                    <button
                                        type="submit"
                                        className="btn btn-primary btn-md mt-4"
                                    >
                                        <SendTwoTone
                                            fontSize="medium"
                                            sx={{ mr: 1, my: 0.1 }}
                                        />
                                        Enviar
                                    </button>
                                </form>
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
