import React from "react";
import { allIndianCities, allGenres } from "../utils/constants";
import { connect } from 'react-redux'
import { showModal } from '../actions/landing-page-actions'

const InstaModal = (props) => {
  const AllIndianCitiesOptions = allIndianCities.map(item => {
    return <option>{item}</option>;
  });

  const genres = allGenres.map(item => {
    return <option>{item}</option>;
  });

  let hideModal = e => {
    e.preventDefault();
    document.body.classList.remove("modal-active");

    props.changeModalState(false);
  };

  return (
    <div className={props.showPopup ? "modal-container-child " : 'hideModal'} >
      <div className="modal-header">
        <span id="modal-header-text">Let's get started</span>
        <div
          className="close-modal-btn"
          onClick={e => {
            hideModal(e);
          }}
        >
          ×
        </div>
      </div>

      <input
        type="text"
        className="form-element"
        placeholder="Insta ID"
        name="insta_id"
      />

      <select name="cities" className="dropdown-items">
        {AllIndianCitiesOptions}
      </select>

      <select name="genres" className="dropdown-items">
        {genres}
      </select>

      <div className="modal-black-line" />

      <div className="modal-btn-container">
        <div className="modal-btn">Submit</div>
      </div>
    </div>
  );
};

const mapStateToProps = (props) => {
  return {
    showPopup: props.showPopup
  }
}

const mapDispatchToProps = (dispatch) => {
  return {
    changeModalState: (show) => {
      showModal(dispatch, show);
    }
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(InstaModal);