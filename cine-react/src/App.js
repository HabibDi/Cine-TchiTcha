import React, { Component } from 'react';
import './style.scss';
import $ from 'jquery';
import LandingPage from './LandingPage.js';
import FindFilm from './FindFilm.js';
import Footer from './Footer';

const googleMap = require('@google/maps').createClient({
  key: 'AIzaSyDWBYN_0J4Xx8RgudNX4sDqRZpnaTu9HKY'
});

class App extends Component {

  componentWillMount() {
    $.get('http://localhost:8000/api', function (data) {
    })
  }
  render() {
    return (
      <div id="body">
        <div id="Header"><h1 className="MasterFF">Header</h1></div>
        <div id="Carrousel"><h1 className="MasterFF">Carrousel</h1></div>
        <LandingPage></LandingPage>
        <FindFilm></FindFilm>

        <Footer></Footer>
      </div>
    );
  }
}

export default App;
