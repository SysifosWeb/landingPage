import Header from "./../HeaderPages";
import { useState } from "react";
import Footer from "./../Footer";
import { Head, router, usePage } from "@inertiajs/react";
import {
    SendTwoTone,
    Mail,
    AccessTime,
    PhoneInTalk,
} from "@mui/icons-material";
import "./../../../css/main.css";
import contact from "./../../../css/contacto.module.css";

const Contacto = () => {
    const { flash } = usePage().props;
    const [values, setValues] = useState({
        name: "",
        email: "",
        message: "",
    });
    const [errors, setErrors] = useState({});

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value;
        setValues((values) => ({
            ...values,
            [key]: value,
        }));
        setErrors((prevErrors) => ({
            ...prevErrors,
            [key]: value ? null : "Este campo es requerido",
        }));
    }

    function handleSubmit(e) {
        e.preventDefault();

        const newErrors = {};

        if (!values.name) newErrors.name = "El nombre es requerido";
        if (!values.email) {
            newErrors.email = "El correo es requerido";
        } else if (!/\S+@\S+\.\S+/.test(values.email)) {
            newErrors.email = "El correo no es válido";
        }
        if (!values.message) newErrors.message = "El mensaje es requerido";

        if (Object.keys(newErrors).length > 0) {
            setErrors(newErrors);
            return;
        }

        router.post("/customers", values, {
            preserveScroll: true,
        });
    }
    console.log(flash);
    return (
        <>
            <Head>
                <title>
                    Contacto | SysifosWeb Soluciones Informáticas Limitada
                </title>
                <meta
                    head-key="description"
                    name="description"
                    content="Quieres cotizar un proyecto? escribenos y te contestaremos lo antes posible para despejar tus dudas sobre precios y tiempo, hablemos!"
                />
                <meta name="robots" content="index, follow" />
                <meta
                    property="og:title"
                    content="Contacto | Sysifos Web Soluciones digitales"
                />
                <meta
                    property="og:url"
                    content="https://www.sysifosweb.cl/contacto"
                />
                <meta
                    property="og:image"
                    content="https://www.sysifosweb.cl/assets/equipoMin-ijW4D7nV.webp"
                />
                <meta property="og:image:width" content="1200" />
                <meta property="og:image:height" content="627" />
                <meta property="fb:app_id" content="1215450019494398" />
                <meta property="og:locale" content="es_LA" />
                <meta property="og:type" content="website" />
                <meta property="og:site_name" content="Sysifos Web" />
            </Head>
            <Header title={"Contactanos!"} />
            <main>
                <section className="container">
                    <div className={`${contact.row} row`}>
                        <div
                            className={`${contact.fondo} d-flex row justify-content-between`}
                        >
                            <div
                                className={`${contact.info} col-lg-6 d-flex align-items-center justify-content-center`}
                            >
                                <div className={`${contact.info_data}`}>
                                    <h4>Agendemos una cita</h4>
                                    <p>
                                        Conozcamosnos más y agendemos una
                                        reunión, para analizar las necesidades y
                                        empezar luego en esa super idea.Puedes
                                        llamarnos o bien escribirnos a nuestro
                                        correo en el horario de atención:
                                    </p>
                                    <div
                                        className={`${contact.cards_} d-flex align-content-center flex-wrap mt-2 gap-5`}
                                    >
                                        <div className={`${contact.card}`}>
                                            <div
                                                className={`${contact.card_item}`}
                                            >
                                                <Mail
                                                    fontSize="large"
                                                    sx={{ mr: 1, my: 0.1 }}
                                                />
                                                <h5>CORREO</h5>
                                            </div>
                                            <p>contacto@sysifosweb.cl</p>
                                        </div>
                                        <div className={`${contact.card}`}>
                                            <div
                                                className={`${contact.card_item}`}
                                            >
                                                <AccessTime
                                                    fontSize="large"
                                                    sx={{ mr: 1, my: 0.1 }}
                                                />
                                                <h5>HORARIO DE ATENCIÓN</h5>
                                            </div>
                                            <p>
                                                Lunes a Viernes : 9am a 7pm{" "}
                                                <br />
                                                Sábados y Domingos : Cerrado
                                            </p>
                                        </div>
                                        <div className={`${contact.card}`}>
                                            <div
                                                className={`${contact.card_item}`}
                                            >
                                                <PhoneInTalk
                                                    fontSize="large"
                                                    sx={{ mr: 1, my: 0.1 }}
                                                />
                                                <h5>TELEFONO</h5>
                                            </div>
                                            <p>+569 49109970</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                className={`${contact.form_container} col-lg-6 d-flex align-items-center justify-content-center`}
                            >
                                <form
                                    className={`${contact.form_contact} d-flex flex-column align-items-center justify-content-center gap-2 px-5`}
                                    onSubmit={handleSubmit}
                                >
                                    <h4 className="text-center">
                                        Envianos un mensaje
                                    </h4>
                                    {flash.success && (
                                        <div className="alert alert-success fs-6">
                                            {flash.success}
                                        </div>
                                    )}
                                    {flash.error && (
                                        <div className="alert alert-danger fs-6">
                                            {flash.error}
                                        </div>
                                    )}
                                    <p className="py-2">
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
                                            className={`form-control ${
                                                errors.name ? "is-invalid" : ""
                                            }`}
                                            id="name"
                                            value={values.name}
                                            onChange={handleChange}
                                            disabled={flash.success}
                                        />
                                        {errors.name && (
                                            <div
                                                className={`${contact.invalid_feedback_small} invalid-feedback`}
                                            >
                                                {errors.name}
                                            </div>
                                        )}
                                    </div>
                                    <div className="col-12">
                                        <label
                                            htmlFor="email"
                                            className="col-form-label-sm"
                                        >
                                            Correo
                                        </label>
                                        <input
                                            type="email"
                                            className={`form-control ${
                                                errors.email ? "is-invalid" : ""
                                            }`}
                                            id="email"
                                            value={values.email}
                                            onChange={handleChange}
                                            disabled={flash.success}
                                        />
                                        {errors.email && (
                                            <div
                                                className={`${contact.invalid_feedback_small} invalid-feedback`}
                                            >
                                                {errors.email}
                                            </div>
                                        )}
                                    </div>
                                    <div className="col-12">
                                        <label
                                            htmlFor="message"
                                            className="col-form-label-sm"
                                        >
                                            Mensaje
                                        </label>
                                        <textarea
                                            className={`form-control ${
                                                errors.message
                                                    ? "is-invalid"
                                                    : ""
                                            }`}
                                            id="message"
                                            rows="3"
                                            value={values.message}
                                            onChange={handleChange}
                                            disabled={flash.success}
                                        />
                                        {errors.message && (
                                            <div
                                                className={`${contact.invalid_feedback_small} invalid-feedback`}
                                            >
                                                {errors.message}
                                            </div>
                                        )}
                                    </div>
                                    {!flash.success ? (
                                        <button
                                            type="submit"
                                            className="btn btn-primary btn-md mt-5"
                                        >
                                            <SendTwoTone
                                                fontSize="medium"
                                                sx={{ mr: 1, my: 0.1 }}
                                            />
                                            Enviar
                                        </button>
                                    ) : (
                                        <button
                                            className="btn btn-primary btn-md mt-5"
                                            disabled
                                        >
                                            Gracias por contactarnos!
                                        </button>
                                    )}
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <Footer />
        </>
    );
};

export default Contacto;
