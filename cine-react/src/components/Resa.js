import React from "react";

export default class extends React.Component {
    render() {
        return (
            <div>
                <form>
                    <fieldset>

                        <legend>Film</legend>

                        <select>
                            <option value="Film 1">Film 1
                            </option>
                            <option value="Film 2">Film 2
                            </option>
                            <option value="Film 3">Film 3
                            </option>
                        </select>
                    </fieldset>

                    <fieldset>

                        <legend>Séance</legend>

                        <input type="radio" name="screening" value="Séance 1">
                        </input> Séance 1
                        <br></br>                        <input type="radio" name="screening" value="Séance 2">
                        </input> Séance 2
                        <br></br>
                        <input type="radio" name="screening" value="Séance 3">
                        </input> Séance 3
                        <br></br>
                    </fieldset>

                    <fieldset>

                        <legend>Coordonnées</legend>
                        Nom: <input type="text" name="lastname"></input>
                        <br></br>
                        Prénom: <input type="text" name="firstname"></input>
                        <br></br>
                        E-mail: <input type="email" name="email"></input>
                    </fieldset>

                    <input type="checkbox" name="acceptConditions"></input> J'accepte de céder mon âme sans contrepartie.

                <br></br>

                    <input type="button" value="Valider la réservation"></input>

                </form>

            </div>
        )
    }
}