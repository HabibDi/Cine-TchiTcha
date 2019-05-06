import React, { Component } from 'react';
import './style.scss';
import $ from 'jquery';

class App extends Component {

  componentWillMount() {
    $.get('http://localhost:8000/api', function (data) {
      console.log(data);
    })
  }
  render() {
  	return (
  		<div id="body">
        <div id="Header"><h1 className="MasterFF">Header</h1></div>
        <div id="Carrousel"><h1 className="MasterFF">Carrousel</h1></div>
        <div id="LandingPage"><h1 className="MasterFF">LandingPage</h1></div>
        <div id="ShowFilm"><h1 className="MasterFF">ShowFilm</h1></div>
        <div id="Footer"><h1 className="MasterFF">Footer</h1></div>
      </div>
  		)
  }
}

export default App;
