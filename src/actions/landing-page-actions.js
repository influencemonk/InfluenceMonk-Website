import {STATE_ACTIONS} from '../utils/constants';


export const scrollOffsetChanged = (dispatch , scrollOffset) => {
    dispatch({ type : STATE_ACTIONS.CHANGE_SCROLL_OFFSET , data : scrollOffset});
}

export const showModal = (dispatch , show) => {
    dispatch({type : STATE_ACTIONS.CHANGE_MODAL_STATE , data : show})
}