import React from "react";
import Footer from "./Footer";
import { Link } from "react-router-dom";
import $ from 'jquery';



//const movieSelec = titres.map((movie) => <option value={movie}>{movie}</option>);



export default class extends React.Component {

	constructor() {
		super();
		this.state = {
			films: [],
		}
	}

	componentWillMount() {
		let that = this;
		$.post('http://localhost:8000/api/', function (res) {
			let movies = res.map(function (movie, i) {
				return (
					<option key={i} value={movie.Id}>{movie.Titre}</option>
				);
			})
			that.setState({ films: movies })
		});
	}

	handleSubmit() {
		let seances = document.querySelectorAll("input[name='screening']");
		let seance;
		let film = document.getElementById('movieList').value;
		let length = seances.length;

		let nom = document.querySelector("input[name='lastname']").value;
		let prenom = document.querySelector("input[name='firstname']").value;
		let mail = document.querySelector("input[name='email']").value;
		console.log(nom, prenom, mail)

		for (var i = 0; i < length; i++) {
			if (seances[i].checked) {
				seance = seances[i].value;
			};
		}

		$.post('http://localhost:8000/api/Reservation', { film: film, seance: seance, nom: nom, prenom: prenom }, function (response) {
			console.log(response, nom);
		})
	}




	render() {
		// console.log(this.state.films);
		return (
			<div id="resa">
				<form>
					<fieldset>

						<legend>Film</legend>

						<select id="movieList"> {
							this.state.films
						}
						</select>
					</fieldset>

					<fieldset>

						<legend>Séance</legend>

						<input type="radio" name="screening" value="Séance 1">
						</input> Séance 1
                        <br></br>
						<input type="radio" name="screening" value="Séance 2">
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

					<Link to="/"> <input type="button" value="Annuler"></input></Link>

					<input type="button" value="Valider la réservation" onClick={this.handleSubmit}></input>

				</form>

				<Footer></Footer>

			</div>
		)
	}
}