import indexcss from "./../../css/index.module.css";
import { WhatsApp } from "@mui/icons-material";

export default function Contact() {
    return (
        <section className={indexcss.prefooter}>
            <div className="container d-flex flex-column align-items-center">
                <h2> No lo pienses más!</h2>
                <p style={{ fontWeight: 300 }}>
                    Contactanos y hablemos sobre el proyecto que tienes en mente
                </p>
                <a
                    className={`btn btn-success btn-lg ${indexcss.btnContact} ${indexcss.btnContactBody}`}
                    aria-label="Chat on WhatsApp"
                    title="Chat on WhatsApp"
                    href="https://wa.me/+56949109970?text=Hola!%20Quisiera%20Más%20información%20porfavor"
                >
                    <WhatsApp fontSize="large" sx={{ mr: 1, my: 0.8 }} />
                    Contactanos
                </a>
            </div>
        </section>
    );
}
