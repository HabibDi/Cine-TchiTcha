import React, { Component } from 'react';
import './App.css';
import $ from 'jquery';
import LandingPage from './LandingPage.js';
import FindFilm from './FindFilm.js';
import Footer from './Footer';
class App extends Component {

  componentWillMount() {
    $.get('http://localhost:8000/api', function (data) {
      console.log(data);
    })
  }
  render() {
    return (
      <div>
        <LandingPage></LandingPage>
        <FindFilm></FindFilm>

        <Footer></Footer>
      </div>
    )

  }
}

export default App;
