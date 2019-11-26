import Header from '../utils/header';
import Slick from '../utils/slick';
import Scroll from '../utils/scroll';
import FixedButton from '../utils/fixedButton';
import SliderTab from '../utils/sliderTab';
import Refine from '../utils/refine';
import Contact from '../utils/contact';
import Sidebar from '../utils/sidebar';
import Affiliate from '../utils/affiliate';


// ヘッダーメニュー
const header = new Header();
header.onloadDocument();
header.clickHeaderButton();

// SLICK
const slick = new Slick();
slick.slickInit();

// スムーズスクロール
const scroll = new Scroll();
scroll.init();

// object-fit対策（IE対応）
objectFitImages();

//追従ボタン
const fixedButton = new FixedButton();
fixedButton.clickMenu();

//ランキングスライダーの入れ替え
const sliderTab = new SliderTab();
sliderTab.clickTab();

//サイドバーの追従
const sidebar = new Sidebar();
sidebar.sticky();

//追従ボタン
const refine = new Refine();
refine.clickRefineAccordion();

//お問合せページ
const contact = new Contact();
contact.selectBoxChange();
contact.selectContactChoice();
contact.checkValidation();

//アフィリエイト
const affiliate = new Affiliate();
affiliate.linkCustom();
