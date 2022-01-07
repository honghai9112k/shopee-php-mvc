-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:4306
-- Thời gian đã tạo: Th1 07, 2022 lúc 08:53 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `Id_account` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`Id_account`, `CustomerId`, `Username`, `Password`) VALUES
(1, 1, 'honghai', '123456'),
(8, 16, 'hai', ' $2y$10$hKyAGto.1MM7YTqJbLGj2OG.bvNJGJUT1nyU4xIBWk1K2UGMaUTn6'),
(10, 18, 'honghai1', ' 123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `Id_address` int(11) NOT NULL,
  `NumberHouse` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Street` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `District` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Nation` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`Id_address`, `NumberHouse`, `Street`, `District`, `City`, `Nation`) VALUES
(1, '16', 'Thanh Niên', 'Phú Túc', 'Hà Nội', 'Việt Nam'),
(2, '16', 'Nguyễn Trãi', 'Hà Đông', 'Hà Nội', 'Việt Nam'),
(3, '30', 'Trần Phú', 'Hà Đông', 'Hà Nội', 'Việt Nam'),
(4, '104', 'Trần Phú', 'Hà Đông', 'Hà Nội', 'Việt Nam'),
(5, '499', 'Nguyễn Trãi', 'Thanh Xuân', 'Hà Nội', 'Việt Nam'),
(6, 'Km 9', 'Nguyễn Trãi', 'Hà Đông', 'Hà Nội', 'Việt Nam'),
(7, '336', 'Nguyễn Trãi', 'Thanh Xuân', 'Hà Nội', 'Việt Nam'),
(8, '91', 'Chùa Láng', 'Đống Đa', 'Hà Nội', 'Việt Nam'),
(9, '81', 'Nguyễn Chí Thanh', 'Đống Đa', 'Hà Nội', 'Việt Nam'),
(10, '521', 'P.Kim Mã', 'Ba Đình', 'Hà Nội', 'Việt Nam'),
(11, '2', 'P.Phạm Văn Bạch', 'Cầu Giấy', 'Hà Nội', 'Việt Nam'),
(12, '136', 'Xuân Thủy', 'Cầu Giấy', 'Hà Nội', 'Việt Nam'),
(13, '15', 'Ngõ Hồ Hố Mẻ', 'Đống Đa', 'Hà Nội', 'Việt Nam'),
(14, '2', 'Phố Trần Đại Nghĩa', 'Hai Bà Trưng', 'Hà Nội', 'Việt Nam'),
(15, '207', 'Giải Phóng', 'Hai Bà Trưng', 'Hà Nội', 'Việt Nam'),
(16, '13-15', 'Lê Thánh Tông', 'Hoàn Kiếm', 'Hà Nội', 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `Id_author` int(11) NOT NULL,
  `Name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Biography` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`Id_author`, `Name`, `Email`, `Biography`) VALUES
(1, 'Nguyễn Nhật Ánh', 'nguyennhatanh@gmail.com', ''),
(2, 'Ngô Tất Tố', '', ''),
(3, 'Huy Cận', '', ''),
(4, 'Nguyên Hồng', '', ''),
(5, 'Nguyễn Đình Thi', '', ''),
(6, 'Tô Hoài ', '', ''),
(7, 'Tố Hữu', '', ''),
(8, 'Xuân Diệu', '', ''),
(9, 'Xuân Quỳnh', '', ''),
(10, 'Trần Đăng Khoa', '', ''),
(11, 'Lưu Quang Vũ', '', ''),
(12, 'Paulo Coelho', '', ''),
(13, 'Paul Kalanithi', '', ''),
(14, 'Thái Phạm', '', 'Founder Cộng đồng Happy Live');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `Id_book` int(11) NOT NULL,
  `BookCategoryId` int(11) NOT NULL,
  `PublisherId` int(11) NOT NULL,
  `ISBN` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Summary` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `PublicationDate` date NOT NULL,
  `NumberOfPage` int(20) NOT NULL,
  `Language` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `SoldNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`Id_book`, `BookCategoryId`, `PublisherId`, `ISBN`, `Title`, `Summary`, `PublicationDate`, `NumberOfPage`, `Language`, `SoldNumber`) VALUES
(11, 3, 1, 'SKU	2518407786529', 'Nhà Giả Kim', 'Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.', '2010-12-07', 228, 'Tiếng Việt', 900),
(12, 4, 1, '978-604-1-01661-3', 'Cho Tôi Xin Một Vé Đi Tuổi Thơ ', 'Truyện Cho tôi xin một vé đi tuổi thơ là sáng tác mới nhất của nhà văn Nguyễn Nhật Ánh. Nhà văn mời người đọc lên chuyến tàu quay ngược trở lại thăm tuổi thơ và tình bạn dễ thương của 4 bạn nhỏ. Những trò chơi dễ thương thời bé, tính cách thật thà, thẳng thắn một cách thông minh và dại dột, những ước mơ tự do trong lòng… khiến cuốn sách có thể làm các bậc phụ huynh lo lắng rồi thở phào. Không chỉ thích hợp với người đọc trẻ, cuốn sách còn có thể hấp dẫn và thực sự có ích cho người lớn trong quan hệ với con mình.', '2018-12-14', 205, 'Tiếng Việt', 90),
(13, 6, 8, '978-604-59-8898-5', 'Khi Hơi Thở Hóa Thinh Không', 'Khi hơi thở hóa thinh không (tựa gốc tiếng Anh: When Breath Becomes Air) là tự truyện của tiến sĩ Paul Kalanithi về cuộc đời và cuộc chiến của anh chống lại căn bệnh ung thư phổi. Cuốn sách được phát hành bởi nhà xuất bản Random House vào ngày 12 tháng 1 năm 2016, sau khi Paul đã qua đời.[1]\r\n\r\nTrong cuốn sách, Paul kể về niềm đam mê với văn học, cũng như những băn khoăn của anh về ý nghĩa của cuộc sống và cái chết. Chúng đã thôi thúc anh theo học chuyên ngành Tiếng Anh và Sinh học ở Đại học Stanford, Lịch sử và Triết học Khoa học - Y dược ở Đại học Cambridge, và cuối cùng là Y khoa ở Đại học Yale.\r\n\r\nKhi đang hoàn thành năm thực tập cuối cùng ở Đại học Stanford trong vai trò bác sĩ giải phẫu thần kinh, Paul Kalanithi bắt đầu nhận thấy các vấn đề sức khỏe như sút cân nhanh và những cơn đau lưng hoặc tức ngực ở các cường độ khác nhau. Mối quan hệ giữa Paul và vợ anh - Lucy - cũng gặp trục trặc khi Lucy cảm thấy Paul không cởi mở về tình trạng của mình. Những chẩn đoán sau đó đi đến kết ', '2016-01-12', 228, 'Tiếng Việt', 0),
(14, 3, 5, '', 'Tắt Đèn', 'Tắt đèn của nhà văn Ngô Tất Tố phản ánh rất chân thực cuộc sống khốn khổ của tầng lớp nông dân Việt Nam đầu thế kỷ XX dưới ách đô hộ của thực dân Pháp. Tác phẩm xoay quanh nhân vật chị Dậu và gia đình – một điển hình của cuộc sống bần cùng hóa sưu cao thuế nặng mà chế độ thực dân áp đặt lên xã hội Việt Nam. Trong cơn cùng cực chị Dậu phải bán khoai, bán bầy chó đẻ và bán cả đứa con để lấy tiền nộp sưu thuế cho chồng nhưng cuộc sống vẫn đi vào bế tắc, không lối thoát.\r\n\r\nTrong tác phẩm, cảnh đời tràn nước mắt của gia đình chị Dậu đã được tái hiện một cách sống động trong từng câu chữ, chi tiết văn học với nhiều cung bậc cảm xúc của tác giả khiến người đọc không khỏi xúc động. Tác phẩm không chỉ kích thích niềm đam mê văn học ở thanh thiếu niên, mà còn bồi đắp cho lớp trẻ những tìm cảm tốt đẹp và khơi dậy lòng trắc ẩn ở các em.', '1937-12-10', 216, 'Tiếng Việt', 0),
(15, 4, 2, '', 'Dế Mèn Phiêu Lưu Ký', 'Ấn bản minh họa màu đặc biệt của Dế Mèn phiêu lưu ký, với phần tranh ruột được in hai màu xanh - đen ấn tượng, gợi không khí đồng thoại.\r\n\r\n“Một con dế đã từ tay ông thả ra chu du thế giới tìm những điều tốt đẹp cho loài người. Và con dế ấy đã mang tên tuổi ông đi cùng trên những chặng đường phiêu lưu đến với cộng đồng những con vật trong văn học thế giới, đến với những xứ sở thiên nhiên và văn hóa của các quốc gia khác. Dế Mèn Tô Hoài đã lại sinh ra Tô Hoài Dế Mèn, một nhà văn trẻ mãi không già trong văn chươ” - Nhà phê bình Phạm Xuân Nguyên\r\n\r\n“Ông rất hiểu tư duy trẻ thơ, kể với chúng theo cách nghĩ của chúng, lí giải sự vật theo lô gích của trẻ. Hơn thế, với biệt tài miêu tả loài vật, Tô Hoài dựng lên một thế giới gần gũi với trẻ thơ. Khi cần, ông biết đem vào chất du ký khiến cho độc giả nhỏ tuổi vừa hồi hộp theo dõi, vừa thích thú khám phá.” - TS Nguyễn Đăng Điệp', '1941-12-17', 195, 'Tiếng Việt', 120),
(16, 7, 2, '', 'Góc Sân Và Khoảng Trời', '\"Tôi tự coi đây là tuyển tập với những dấu ấn thật khó quên của tuổi thơ tôi, trong những năm tháng đánh giặc gian khổ và hào hùng. Làng tôi là một trạm nghỉ chân trên đường đi B của các trung đoàn đồng bằng Bắc Bộ, trong suốt thời kì huấn luyện ở núi rừng Yên Tử. Hàng ngàn chú bộ đội đã lần lượt rải chiếu ngủ trên nền đất nhà tôi. Các chú nghe thơ tôi, chép thơ tôi vào sổ tay và mang nó ra mặt trận. Sự tiếp xúc có phần ngẫu nhiên đó đã dạy tôi một cách nghiêm túc phải viết như thế nào.\"\r\n\r\n(Trần Đăng Khoa)', '1968-12-02', 223, 'Tiếng Việt', 123),
(21, 8, 1, '123456789', 'Thiết Kế Cuộc Đời Thịnh Vượng - Design a Prosperou', 'Có thể nói, đây vừa là một quyển tự truyện đi kèm với những bí quyết tạo nên một cuộc đời đáng sống trong suốt 20 năm “lăn lộn” trường đời của tác giả. \r\n\r\nQuyển sách không ru ngủ bạn với những công thức thay đổi bản thân thần thánh mà tập trung vào giải quyết những vấn đề của bạn bằng cách đưa ra các phương pháp đánh giá, nhìn nhận bản thân và cung cấp cho bạn những “vật tư” xây nên một cuộc đời bạn mong muốn. \r\n\r\nBởi trước khi xây trên nền đất mới những công trình kiên cố, bạn phải đập bỏ những suy nghĩ cũ rích – những thứ vẫn đang giữ chân bạn với sự tầm thường. Bạn không thể xây nên một ngôi nhà đẹp và vững chắc từ một nền nhà kém chất lượng. Những viên gạch kém chất lượng mà bạn cần đập bỏ là những thành kiến về người giàu, những suy nghĩ sai lệch về thành công như chỉ có học đại học là con đường duy nhất để đạt được mục tiêu, ai thành công cũng đều hạnh phúc, theo đuổi đam mê, tiền sẽ tới,… Những điều nghe có vẻ hay, có vẻ ổn nhưng hệ quả của những suy nghĩ đó với cuộc sống của b', '2020-02-24', 352, 'Tiếng Việt', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookcategory`
--

CREATE TABLE `bookcategory` (
  `Id_category` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookcategory`
--

INSERT INTO `bookcategory` (`Id_category`, `Name`) VALUES
(8, 'Phóng sự-Ký sự-Bút ký'),
(7, 'Thơ'),
(6, 'Tiểu sử-Hồi ký'),
(3, 'Tiểu thuyết'),
(2, 'Tranh truyện'),
(5, 'Truyện cổ tích-Ngụ ngôn'),
(4, 'Truyện dài'),
(9, 'Truyện ngắn-Tản văn-Tạp văn'),
(1, 'Văn học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookitem`
--

CREATE TABLE `bookitem` (
  `Id_bookItem` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Barcode` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Discount` int(11) NOT NULL,
  `Image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookitem`
--

INSERT INTO `bookitem` (`Id_bookItem`, `BookId`, `Price`, `Barcode`, `Discount`, `Image`, `Description`) VALUES
(9, 11, 100000, '518407786529', 10, 'nhagiakim.jpg', '“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”\r\n\r\n- Trích Nhà giả kim'),
(10, 12, 80000, '1234560', 20, 'Cho-tôi-xin-một-vé-đi-tuổi-thơ-6.jpg', ''),
(11, 13, 109000, '9780812988406', 35, 'Sách-Khi-hơi-thở-hóa-thinh-không.jpg', 'Giá sản phẩm trên Shopee đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....'),
(12, 14, 50000, '', 21, 'tieu-thuyet-tat-den-cua-nha-van-ngo-tat-to.jpg', 'Giá sản phẩm trên Shopee đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....'),
(13, 15, 150000, '', 14, 'demen2-1_e2c438a300564eeb8821c720c9cb6d25.png', 'Giá sản phẩm trên Shopee đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....'),
(14, 16, 50000, '', 0, 'gocsanvakhoangtroi.png', 'Giá sản phẩm trên shopee đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....'),
(19, 21, 299000, '123456789', 0, '6c9a4e240ed44d5c9724cca9ac15115a.jfif', 'Giá sản phẩm trên Shopee đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_author`
--

CREATE TABLE `book_author` (
  `BookId` int(11) NOT NULL,
  `AuthorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_author`
--

INSERT INTO `book_author` (`BookId`, `AuthorId`) VALUES
(11, 12),
(12, 1),
(13, 13),
(14, 2),
(15, 6),
(16, 10),
(21, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `Id_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`Id_cart`) VALUES
(1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_bookitem`
--

CREATE TABLE `cart_bookitem` (
  `CartId` int(11) NOT NULL,
  `BookItemId` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_bookitem`
--

INSERT INTO `cart_bookitem` (`CartId`, `BookItemId`, `Amount`) VALUES
(1, 9, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `Id_customer` int(11) NOT NULL,
  `AddressId` int(11) NOT NULL,
  `Name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Mail` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`Id_customer`, `AddressId`, `Name`, `Phone`, `Mail`) VALUES
(1, 1, 'Hải', '0969427629', 'honghai@gmail.com'),
(16, 1, 'Hải', '09878665432', 'hai@gmail.com'),
(18, 2, 'Hong Hai', '0969427629', 'honghai@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `Id_order` int(11) NOT NULL,
  `PaymentId` int(11) NOT NULL,
  `ShipmentId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `CartId` int(11) NOT NULL,
  `TotalPrice` int(20) NOT NULL,
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DeliveryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `Id_payment` int(11) NOT NULL,
  `PaymentType` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`Id_payment`, `PaymentType`) VALUES
(1, 'Tiền Mặt'),
(2, 'Thẻ ngân hàng'),
(3, 'Thẻ tín dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publisher`
--

CREATE TABLE `publisher` (
  `Id_publisher` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `publisher`
--

INSERT INTO `publisher` (`Id_publisher`, `Name`, `Address`) VALUES
(1, 'Nhà xuất bản trẻ', '161B Lý Chính Thắng, Phường 7, Quận 3, Thành phố Hồ Chí Minh.'),
(2, 'Nhà xuất bản Kim Đồng', '55 Quang Trung, Hai Bà Trưng, Hà Nội'),
(3, 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh', ' 62 Nguyễn Thị Minh Khai, Phường Đa Kao, Quận 1, TP.HCM'),
(4, 'Nhà xuất bản chính trị quốc gia sự thật', 'Số 6/86 Duy Tân, Cầu Giấy, Hà Nội;'),
(5, 'Nhà xuất bản giáo dục', ' 81 Trần Hưng Đạo, Hà Nội'),
(6, 'Nhà xuất bản Hội Nhà văn', 'Số 65 Nguyễn Du, Hà Nội'),
(7, 'Nhà xuất bản thông tin và truyền thông', 'Tầng 6, Tòa nhà Cục Tần số Vô tuyến điện, số 115 Trần Duy Hưng, Hà Nội'),
(8, 'Nhà xuất bản lao động', '175 Giảng Võ, Đống Đa, Hà Nội'),
(9, 'Nhà xuất bản Đại học Quốc Gia Hà Nội', '16 Hàng Chuối, Phạm Đình Hổ, Hai Bà Trưng, Hà Nội'),
(10, 'Nhà xuất bản giao thông vận tải', '80B Trần Hưng Đạo, Hoàn Kiếm, Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipment`
--

CREATE TABLE `shipment` (
  `Id_shipment` int(11) NOT NULL,
  `AddressId` int(11) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipment`
--

INSERT INTO `shipment` (`Id_shipment`, `AddressId`, `Cost`) VALUES
(1, 1, 20000),
(2, 2, 22500),
(3, 3, 16500),
(4, 4, 12500),
(5, 5, 12500),
(6, 6, 22500),
(7, 7, 22500),
(8, 8, 22500),
(9, 9, 22500),
(10, 10, 16500),
(11, 11, 16500),
(12, 12, 22500),
(13, 13, 22500),
(14, 14, 16500),
(15, 15, 16500),
(16, 16, 16500);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Id_account`),
  ADD UNIQUE KEY `UNIQUE` (`Username`),
  ADD KEY `CustomerId` (`CustomerId`);

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Id_address`);

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Id_author`);

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Id_book`),
  ADD KEY `BookCategoryId` (`BookCategoryId`),
  ADD KEY `PublisherId` (`PublisherId`);

--
-- Chỉ mục cho bảng `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`Id_category`),
  ADD UNIQUE KEY `UNIQUE` (`Name`);

--
-- Chỉ mục cho bảng `bookitem`
--
ALTER TABLE `bookitem`
  ADD PRIMARY KEY (`Id_bookItem`),
  ADD KEY `BookId` (`BookId`);

--
-- Chỉ mục cho bảng `book_author`
--
ALTER TABLE `book_author`
  ADD KEY `AuthorId` (`AuthorId`),
  ADD KEY `BookId` (`BookId`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id_cart`);

--
-- Chỉ mục cho bảng `cart_bookitem`
--
ALTER TABLE `cart_bookitem`
  ADD KEY `BookItemId` (`BookItemId`),
  ADD KEY `CartId` (`CartId`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_customer`),
  ADD KEY `AddressId` (`AddressId`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Id_order`),
  ADD KEY `PaymentId` (`PaymentId`),
  ADD KEY `ShipmentId` (`ShipmentId`),
  ADD KEY `CustomerId` (`CustomerId`),
  ADD KEY `CartId` (`CartId`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Id_payment`);

--
-- Chỉ mục cho bảng `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Id_publisher`);

--
-- Chỉ mục cho bảng `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`Id_shipment`),
  ADD KEY `AddressId` (`AddressId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `Id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `Id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `Id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `Id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `bookcategory`
--
ALTER TABLE `bookcategory`
  MODIFY `Id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `bookitem`
--
ALTER TABLE `bookitem`
  MODIFY `Id_bookItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `Id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `Id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `Id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `Id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `publisher`
--
ALTER TABLE `publisher`
  MODIFY `Id_publisher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `shipment`
--
ALTER TABLE `shipment`
  MODIFY `Id_shipment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Id_customer`);

--
-- Các ràng buộc cho bảng `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`BookCategoryId`) REFERENCES `bookcategory` (`Id_category`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`PublisherId`) REFERENCES `publisher` (`Id_publisher`);

--
-- Các ràng buộc cho bảng `bookitem`
--
ALTER TABLE `bookitem`
  ADD CONSTRAINT `bookitem_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`Id_book`);

--
-- Các ràng buộc cho bảng `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_ibfk_1` FOREIGN KEY (`AuthorId`) REFERENCES `author` (`Id_author`),
  ADD CONSTRAINT `book_author_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`Id_book`);

--
-- Các ràng buộc cho bảng `cart_bookitem`
--
ALTER TABLE `cart_bookitem`
  ADD CONSTRAINT `cart_bookitem_ibfk_1` FOREIGN KEY (`BookItemId`) REFERENCES `bookitem` (`Id_bookItem`),
  ADD CONSTRAINT `cart_bookitem_ibfk_2` FOREIGN KEY (`CartId`) REFERENCES `cart` (`Id_cart`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`AddressId`) REFERENCES `address` (`Id_address`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`PaymentId`) REFERENCES `payment` (`Id_payment`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`ShipmentId`) REFERENCES `shipment` (`Id_shipment`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Id_customer`),
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`CartId`) REFERENCES `cart` (`Id_cart`);

--
-- Các ràng buộc cho bảng `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`AddressId`) REFERENCES `address` (`Id_address`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
