import { STATE_ACTIONS } from '../utils/constants';

const initState = {
    scrollOffset: 0,
    showPopup: false
}


export const rootReducer = (state = initState, action) => {
    switch (action.type) {
        case STATE_ACTIONS.CHANGE_MODAL_STATE:
            return{
                ...state,
                showPopup : action.data
            }
            break;
        case STATE_ACTIONS.CHANGE_SCROLL_OFFSET:
            return {
                ...state,
                scrollOffset: action.data
            }
            break;

        default:
            return state;
    }
}