import Header from '../utils/header';
import Slick from '../utils/slick';
import Scroll from '../utils/scroll';
import Hugelink from '../utils/Hugelink';
import FixedButton from '../utils/fixedButton';

// ヘッダーメニュー
const header = new Header();
header.openHeaderNav();

// SLICK
const slick = new Slick();
slick.slickInit();

// スムーズスクロール
const scroll = new Scroll();
scroll.init();

// リンクパネル
const hugelink = new Hugelink();
hugelink.init();

// object-fit対策（IE対応）
objectFitImages();

const fixedButton = new FixedButton();
fixedButton.clickMenu();
