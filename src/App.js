import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import LandingPage from './components/landing-page'
import {BrowserRouter as Router  ,  Route , Switch, Link} from 'react-router-dom';

class App extends Component {
  render() {
    return (
      <Router>
      <Switch>
        <Route exact path = "/" component = {LandingPage}></Route>
      </Switch>
    </Router>
    );
  }
}

export default App;
