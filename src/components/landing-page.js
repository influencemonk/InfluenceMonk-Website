import React, { Component } from 'react';
import {connect} from 'react-redux';
import InstaModal from './insta-modal'
import  {scrollOffsetChanged , showModal} from '../actions/landing-page-actions'

class LandingPage extends Component {
    
    constructor() {

        super();

      

    }

    componentDidMount() {
        window.addEventListener('scroll', this.getScrollOffset);

        let self = this;

        document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27) {
               self.closePopup();
            }
        };
    }

    closePopup = () => {
        this.props.changePopupState(false);
    }

    getScrollOffset = () => {

        let offset = document.documentElement.scrollTop

        const scrollTop = offset

        if ((scrollTop !== 0 && this.props.scrollOffset === 0) ||
             (scrollTop === 0 && this.props.scrollOffset !== 0)) {
            
                this.props.changeScrollState(scrollTop);
        }
    }

    showPopup = (e) => {
        
        if(e !== null)
            e.preventDefault();

        if(! this.props.showPopup)
            document.body.classList.add("modal-active");

        this.props.changePopupState( !this.props.showPopup );

    }

    render() {
        return (
            <div className="app" ref={this.myRef}>

                <div className="container">

                    <div className={this.props.scrollOffset != 0 ? 'navigation-container shadow' : 'navigation-container'} >
                        <div className="img-logo-container">
                            <img className="img-logo" src="https://influencemonk.com/wp-content/themes/influencemonk/img/influenceMonk.png" alt="InfluenceMonk" />
                        </div>

                        <div className="navigation-menu-container">
                            <div className="menu-item-links">
                                <div className="item-home">HOME</div>
                                <div className="item-home">BLOG</div>
                                <div className="item-home">ABOUT US</div>
                            </div>
                            <div className="item-home "><div className="btn-influencer" onClick={(e) => this.showPopup(e)}>Are you an influencer?</div></div>
                        </div>

                    </div>

                    <div className="main-container">
                        <div className="middle-moto-container">
                            <div className="banner">
                                <div className="left-container">
                                    <div className="left-container-header">
                                        Targeted Influencer Marketing
                                </div>
                                    <div className="left-container-subheader">
                                        at your fingertips
                                </div>
                                    <div className="container-content">
                                        We help you with branding and generating leads using many influencers who have a small targeted following that trusts them.
                                </div>
                                    <div className="left-container-action">
                                        <div className="btn-get-started container-action">
                                            Let's get started
                                    </div>

                                        <div className="btn-tell-me-more container-action">
                                            Tell me more
                                    </div>

                                    </div>
                                </div>

                                <div className="banner-image">
                                    <img src="https://influencemonk.com/wp-content/themes/influencemonk/img/influencer.png" alt="influencer"></img>
                                </div>

                            </div>
                        </div>

                        <div className="why-us-container">
                            <div id="why-influence-marketing">Why influence marketing?</div>


                            <div className="reasons-container">
                                <div className="reason-item">
                                    <div><img className="img-logo-reason" src="https://influencemonk.com/wp-content/themes/influencemonk/img/higher_conversions.png" alt="higher conversion" /></div>
                                    <div className="reason-text">
                                        <div className="reason-header">
                                            Quality conversion
                                    </div>
                                        <div className="reason-content">
                                            Get higher quality conversions than traditional campaigns.
                                    </div>
                                    </div>
                                </div>

                                <div className="reason-item">
                                    <div  ><img className="img-logo-reason" src="https://influencemonk.com/wp-content/themes/influencemonk/img/cheaper.png" alt="higher conversion" /></div>
                                    <div className="reason-text">
                                        <div className="reason-header">
                                            36% Lower Cost
                                </div>
                                        <div className="reason-content">
                                            A more cost-efficient solution for your marketing campaigns
                                </div>
                                    </div>
                                </div>


                                <div className="reason-item">
                                    <div ><img className="img-logo-reason" src="https://influencemonk.com/wp-content/themes/influencemonk/img/loyal_community.png" alt="higher conversion" /></div>
                                    <div className="reason-text">
                                        <div className="reason-header">
                                            Loyal Community
                                </div>
                                        <div className="reason-content">
                                            Build a loyal community of customers who recommend you to other prospects.
                                </div>
                                    </div>
                                </div>


                                <div className="reason-item">
                                    <div  ><img className="img-logo-reason" src="https://influencemonk.com/wp-content/themes/influencemonk/img/customers_trust.png" alt="higher conversion" /></div>
                                    <div className="reason-text">
                                        <div className="reason-header">
                                            Customers' Trust
                                </div>
                                        <div className="reason-content">
                                            People trust people, not ads. Gain your potential customers' trust.
                                </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div className="succeed-container">
                            <div className="succeed-small-text">We provide you with expertise, insights and do the heavy lifting.</div>
                            <div id="succeed-big-text">How do we help succeed?</div>

                            <div className="succeed-child-container">
                                <div className="succeed-logo"><img className="img-succeed-logo" src="https://influencemonk.com/wp-content/themes/influencemonk/img/instagram_post.png" alt="instagram post" /></div>
                                <div className="succeed-points">
                                    <ul>

                                        <div className="list-container">

                                            <div className="bullet"></div>

                                            <div className="succeed-item-container">

                                                <li className="succeed-item">
                                                    <h3 className="succeed-header">1000+ Influencers</h3>
                                                    <div className="succeed-content">We connect you with over 1000 influencers.</div>
                                                </li>
                                            </div>
                                        </div>
                                        <div className="list-container">

                                            <div className="bullet"></div>

                                            <div className="succeed-item-container">

                                                <li className="succeed-item">
                                                    <h3 className="succeed-header">Shipment & Tracking</h3>
                                                    <div className="succeed-content">We handle all your product shipment & tracking.</div>
                                                </li>
                                            </div>
                                        </div><div className="list-container">

                                            <div className="bullet"></div>

                                            <div className="succeed-item-container">

                                                <li className="succeed-item">
                                                    <h3 className="succeed-header">AI Powered Insights</h3>
                                                    <div className="succeed-content">We provide you with AI powered campaign insights.  </div>
                                                </li>
                                            </div>
                                        </div>
                                        <div className="list-container">

                                            <div className="bullet"></div>

                                            <div className="succeed-item-container">

                                                <li className="succeed-item">
                                                    <h3 className="succeed-header">Targeted Audience</h3>
                                                    <div className="succeed-content">We help you select your audience and reach them.</div>
                                                </li>
                                            </div>
                                        </div><div className="list-container">

                                            <div className="bullet"></div>

                                            <div className="succeed-item-container">

                                                <li className="succeed-item">
                                                    <h3 className="succeed-header">Post Tracking</h3>
                                                    <div className="succeed-content">We check the posts' content and timing.</div>
                                                </li>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div className="bottom-container">
                            <div className="bottom-container-child">
                                <div className="bottom-container-header">Ready to rock your influencer marketing campaigns?</div>
                                <div className="bottom-container-btn "><div className="btn-container">Get started now</div></div>
                            </div>

                            <div className="bottom-container-contact">

                                <div className="bottom-get-back-container">
                                    <div className="get-back-header">Want us to get back to you?</div>
                                    <div className="get-back-text">We will get in touch</div>
                                </div>

                                <div className="contact-us-bottom">
                                    <div className="message-container">
                                        <div className="message-label"><label for="message">Your message</label></div>
                                        <textarea rows="11" className="form-control message-container-field" name="message" />
                                    </div>

                                    <div className="submit-container">
                                        <input type="text" placeholder="Your email" name="emailFrom" className="form-control email-field" />
                                        <button className="btn-lets-go">Let's Go</button>
                                    </div>

                                </div>
                            </div>


                        </div>


                        <div className="footer-container">

                            <div className="logo-container">
                                <div className="logo-name"><span id="logo-prefix">influence</span>Monk</div>
                                <div className="logo-full-name">© 2018, InfluenceMonk Pvt Ltd</div>
                            </div>


                            <div className="social-container">
                                <div className="social-container-text">Follow us around the web </div>
                                <div className="social-icons">
                                    <img src="https://influencemonk.com/wp-content/themes/influencemonk/img/facebook_logo.png" alt="facebook logo" />
                                    <img src="https://influencemonk.com/wp-content/themes/influencemonk/img/instagram_logo.png" alt="instagram logo"></img>
                                    <img src="https://influencemonk.com/wp-content/themes/influencemonk/img/twitter_logo.png" alt="twitter logo"></img>
                                    <img src="https://influencemonk.com/wp-content/themes/influencemonk/img/linkedin_logo.png" alt="linkedin logo"></img>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div className={this.props.showPopup === true ? "blackshadow" : "invisible"} onClick={(e) => {this.showPopup(e)}}>
                    <InstaModal/>
                </div>

            </div >
        )
    }
}

const mapStateToProps = (state) => {
    return{
        scrollOffset : state.scrollOffset,
        showPopup : state.showPopup
    }
}

const mapDispatchToProps = (dispatch) => {
    return{
        changeScrollState : (scrollOffset) => {
            scrollOffsetChanged(dispatch , scrollOffset);
        },
        changePopupState : (popupState) => {
            showModal(dispatch , popupState);
        }
    }
}

export default connect(mapStateToProps , mapDispatchToProps)(LandingPage);