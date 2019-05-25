import React from "react";

export default class Footer extends React.Component {
    render() {
        return (
            <div id="Footer">
                <div >
                    <p className="MasterFF">
                        Inscrivez-vous à notre newsletter
                    </p>
                    <form>
                        E-mail:<input type="email" name="email"></input>
                        <button>
                            S'inscrire
                            </button>
                    </form>
                </div>
            </div>
        )
    }

}
