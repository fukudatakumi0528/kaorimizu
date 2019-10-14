import Header from '../utils/header';
import Slick from '../utils/slick';
import Scroll from '../utils/scroll';
import FixedButton from '../utils/fixedButton';
import SliderTab from '../utils/sliderTab';
import Refine from '../utils/refine';
import Contact from '../utils/contact';

// ヘッダーメニュー
const header = new Header();
header.openHeaderNav();
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

//追従ボタン
const sliderTab = new SliderTab();
sliderTab.clickTab();

//追従ボタン
const refine = new Refine();
refine.clickRefineAccordion();

//お問合せページ
const contact = new Contact();
contact.selectBoxChange();
contact.selectContactChoice();
