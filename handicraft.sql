-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2024 lúc 06:21 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `handicraft`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_account`
--

CREATE TABLE `admin_account` (
  `admin_account_id` int(11) NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL CHECK (char_length(`admin_username`) >= 8),
  `admin_password` varchar(255) DEFAULT NULL CHECK (char_length(`admin_password`) >= 8)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_account`
--

INSERT INTO `admin_account` (`admin_account_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin_test', '02122003');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_event`
--

CREATE TABLE `discount_event` (
  `discount_event_id` int(11) NOT NULL,
  `discount_event_name` varchar(255) DEFAULT 'Default Discount Event Name',
  `discount_event_begin` datetime DEFAULT NULL,
  `discount_event_end` datetime DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT 'Default Product Name',
  `product_description` text DEFAULT 'Default Product Description',
  `product_thumbnail_image` varchar(255) DEFAULT NULL,
  `product_price` decimal(18,0) DEFAULT 0,
  `product_discount` decimal(18,0) DEFAULT 0,
  `product_review_positive` int(11) DEFAULT 0,
  `product_review_negative` int(11) DEFAULT 0,
  `product_bought_count` int(11) DEFAULT 0,
  `product_inventory` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_category_id`, `product_name`, `product_description`, `product_thumbnail_image`, `product_price`, `product_discount`, `product_review_positive`, `product_review_negative`, `product_bought_count`, `product_inventory`) VALUES
(1, 1, 'Drakkar Viking', 'Những chiếc thuyền dài được trang bị mái chèo dọc theo toàn bộ chiều dài của con thuyền. Các phiên bản sau này có một cánh buồm hình chữ nhật trên một cột buồm được sử dụng để thay thế hoặc tăng cường sức lực của người chèo thuyền, đặc biệt là trong những chuyến hành trình dài.', 'i1.jpg', 3290000, 0, 0, 0, 0, 222),
(2, 1, 'Amerigo 260CM', 'Trong phong thủy, con thuyền được coi là biểu tượng của sự thành công. Con thuyền sẽ vượt qua sóng gió và thắng lợi trong kinh doanh, giao dịch, buôn bán. Chính vì vậy, mô hình thuyền gỗ luôn là vật phẩm phong thủy rất được các doanh nhân và thương gia trên thế giới ưa chuộng.', '2_i1.jpg', 12190000, 0, 0, 0, 1, 544),
(5, 2, 'Tranh ĐH Gỗ 81CM', 'Tranh gỗ Chợ Quê đục tay đem lại cho chúng ta cảm giác yên bình đến lạ, gợi lên sự đầy đủ, sung túc.', 'd80716cc203f45dfa69f7822cfe826bb1.jpg', 2990000, 199000, 0, 0, 0, 551),
(7, 3, 'Bộ bình trà Bát Tràng cao cấp', 'Bộ bình trà Bát Tràng cao cấp dung tích 1200ml vẽ hoa cúc chàm. Giá bán bộ bình trà Bát Tràng, giá bán bộ ấm trà Bát Tràng, giá bán bộ ấm trà cao cấp, giá bán bộ ấm trà đẹp...', 'df86ff8cce5a4ffc9cb74d089c7372a11.jpg', 950000, 99000, 0, 0, 0, 285),
(8, 3, 'Bộ ấm trà Cá Chép men rạn', 'Bộ ấm trà Cá Chép men rạn gốm sứ Bát Tràng cao cấp. Giá bán bộ ấm trà Bát Tràng, giá bán bộ ấm trà men rạn, giá bán bộ ấm trà cao cấp, giá bán bộ ấm trà đẹp, giá bán bộ ấm trà gốm sứ decor...', '0f37237acaa04339928c343c4427771c1.jpg', 1250000, 0, 0, 0, 0, 1951),
(9, 3, 'Ấm chén quai sứ vẽ Hoa Mai vàng', 'Ấm chén quai sứ vẽ Hoa Mai vàng Gốm sứ Bát Tràng cao cấp. Giá bán ấm chén mỹ nghệ, giá bán ấm chén vẽ hoa, giá bán ấm chén cao cấp, giá bán ấm chén Bát Tràng, giá bán ấm chén đẹp...', '46b58995e3174850aa4f24ac3af43e0b1.jpg', 500000, 39000, 0, 0, 0, 0),
(10, 3, 'Ấm chén độc ẩm gốm sứ vẽ cá đàn', 'Ấm chén độc ẩm gốm sứ vẽ cá đàn gốm sứ Bát Tràng cao cấp. Giá bán ấm chén độc ẩm, giá bán ấm chén đẹp, giá bán ấm chén cao cấp, giá bán ấm chén Bát Tràng...', 'c6ecca529b55414fb0fbce93a63878131.jpg', 290000, 0, 0, 0, 0, 0),
(11, 4, 'Trống đồng mỹ nghệ - TRO2', 'Trống Đồng được xem như là quốc bảo của Việt Nam, là vật gìn giữ giá trị tinh hoa dân tộc, khi treo trong nhà có thể mang vượng khí cho gia chủ. Trống đồng được chế tác theo quy trình ăn mòn tại làng nghề đúc đồng Đại Bái, tỉ mỉ tới từng chi tiết đường nét hoa văn sắc nét. Kích thước: đường kính 40cm.', 'bc42b78cda68459da224d54436566ab51.jpg', 600000, 0, 0, 1, 92, 1),
(12, 4, 'Mặt trống đồng Việt Nam - TRO1', 'Trống đồng được xem là biểu tượng của nền văn hóa Việt Nam từ 2500 năm trước, với 2 loại là Trống đồng Ngọc Lũ và trống đồng Đông Sơn. Trống đồng được chế tác theo quy trình ăn mòn tại làng nghề đúc đồng Đại Bái, tỉ mỉ tới từng chi tiết đường nét hoa văn sắc nét. Chất liệu: Đồng vàng 100%.', 'ec28a89a0f3f4b4090f68736b639327f1.jpg', 829000, 50000, 0, 2, 123, 1),
(13, 1, 'Thuyền Buồm Thái Lan Gỗ Cẩm 100cm', 'Mô Hình Thuyền Buồm Thái Lan Gỗ Cẩm có bộ buồm được làm bằng gỗ, uống cong tạo hình cho một con thuyền căng gió, kèm theo các tàu cứu hộ.', '0a536b6a369046878125fb2e0d473d161.jpg', 2250000, 0, 0, 0, 0, 0),
(16, 1, 'Thuyền buồm Wasa', 'Wasa (hoặc Vasa) là một con tàu chiến của Thụy Điển được xây dựng giữa năm 1626 và 1628. Con tàu Wasa là một trong những điểm du lịch nổi tiếng nhất của Thụy Điển và đã được viếng thăm bởi hơn 35 triệu khách thăm kể từ năm 1961. Kể từ khi khôi phục, Wasa đã trở thành một biểu tượng được công nhận rộng rãi “thời kỳ quyền lực tuyệt vời” của Thụy Điển. Đến ngày nay được xem là một tiêu chuẩn de facto trong các phương tiện truyền thông và trong số những người Thụy Điển để đánh giá tầm quan trọng lịch sử của vụ đắm tàu.', 'a0f66c6f01c941a1a87f23f091d24a9c1.jpg', 2790000, 0, 0, 0, 0, 0),
(17, 2, 'Tranh Gỗ Bốn Mùa Tùng Cúc', 'Bộ tranh tứ quý thể hiện sự luân chuyển của đất trời với bốn mùa Xuân – Hạ – Thu – Đông. Sự luân chuyển này vừa đem lại may mắn cho con người, vừa là những hy vọng, ước mong về một cuộc sống luôn được suôn sẻ, may mắn và thịnh vượng. Việc treo tranh tứ quý không chỉ đơn thuần là để lấp khoảng trống trên tường hay treo ở đâu cũng được, mà phải treo làm sao để vừa làm đẹp cho không gian vừa đem lại may mắn tài lộc hay nói cách khác là sự hài hòa của một không gian.', 'd4e0de940d3d4e328d5526b9a3a678861.jpg', 19900000, 1290000, 0, 0, 0, 0),
(18, 2, 'Tranh Gỗ Cá Chép Trông Trăng', 'Tranh lý ngư vọng nguyệt là một ý nghĩa trừu tượng, thể hiện được sự thanh cao, tao nhân mặc khách của chủ nhân. Một sự phân rõ thực ảo qua việc ngắm trăng đáy nước vẫn thấy được trăng, vẫn thấy đúng trăng là trăng, chỉ có điều lúc đó trăng không còn là trăng, chú cá chép kia không sai khi ngắm trăng, những người ngắm tranh sẽ hiểu rằng có một vầng trăng thật hơn nữa.', 'eaf9a8349bdf4766b87359c6e107d8271.jpg', 3500000, 0, 0, 0, 0, 851),
(19, 1, 'Tàu chở hàng France II', 'Mô hình tàu thuyền chở hàng France II được làm thủ công (bằng tay) với kỹ thuật như kỹ thuật đóng thuyền thật. Thân tàu làm bằng gỗ, buồm vải, dây dù, các chi tiết chạm trổ như mỏ neo được làm bằng kim loại, bảng tên và chân đế làm bằng đồng thau.\r\nKhi mua thuyền, bạn nên đặc biệt chú trọng các chi tiết bên trên bề mặt thuyền, tránh trường hợp chọn mô hình thuyền với bề mặt gỗ trơn tru mà không có các chi tiết phụ, sẽ làm mất giá trị chiếc thuyền. Nếu quan sát kĩ lưỡng, có thể thấy tàu thuyền mô hình tại Mỹ Nghệ Việt được làm rất tỉ mỉ đến từng chi tiết nhỏ như mô hình thật.', '111ed40f8fa44f1e86cb693a0f24870d1.jpg', 3990000, 0, 0, 0, 6, 993),
(20, 1, 'Thuyền Buồm HMS Victory', 'Mô Hình Thuyền Buồm HMS Victory được làm thủ công (bằng tay) với kỹ thuật như kỹ thuật đóng thuyền thật. Thân tàu làm bằng gỗ, buồm vải, dây dù, các chi tiết chạm trổ như mỏ neo được làm bằng kim loại.\r\nTheo nghiên cứu của các nhà phong thủy thì để có được vận may trong kinh doanh, bạn nên đặt một chiếc thuyền buồm trên bàn làm việc hay gần cửa ra vào sao cho chiếc thuyền di chuyển theo hướng đi vào bên trong văn phòng, công ty và tuyệt đối không để thuyền buồm hướng ra ngoài cửa, vì như thế nó lại mang ý nghĩa chạy mất.', '143f5f3a2aae40eb8f1ab73e36d69fec1.jpg', 5190000, 159000, 0, 0, 6, 993),
(21, 1, 'Thuyền Buồm Kaiwo Nhật Bản', 'Kaiwo Maru (Vua của biển cả) là tàu huấn luyện của Nhật với 4 cột buồm. Nó được dựng đồng thời hạ thuỷ vào năm 1989 nhằm thay thế cho một con tàu cùng tên năm 1930.\r\nNó là thành viên thường xuyên của các giải đấu quốc tế như: Operation Sail, và nhiều lần thắng giải Boston Teapot Trophy, giải dành cho thuyền buồm huấn luyện. Nhưng nó được nhớ đến nhiều nhất khi vượt qua được trận bão Tokage lịch sử vào tháng 10/2004. 30 trong tổng số 167 thuỷ thủ đoàn bị thương trong nỗ lực giải cứu đáng trân trọng. Nó ngưng hoạt động cho đến tháng 01/2006 sau khi được sửa chữa lại.', '3f401f901d08486f82ed13bccd8598d11.jpg', 2000000, 0, 0, 0, 0, 999),
(22, 1, 'Black Pearl (Ngọc Trai Đen)', 'BLACK PEARL (Ngọc Trai Đen) là con tàu giả tưởng trong loạt phim “Cướp biển vùng Caribê”. Trong các cảnh phim, Black Pearl hiện lên là một con tàu đen tuyền huyền bí từ thân đến buồm. Cũng có giả thuyết rằng Black Pearl là tên một con tàu có thật được chỉ huy bởi thuyền trưởng Henry Morgan, một cướp biển khét tiếng khắp thế giới, nó hạ thuỷ năm 1669. Black Pearl quyến rũ bởi nét đẹp hoang dã và từ những câu chuyện huyền bí từ thế giới cướp biển. Nó được mệnh danh là “không thể đuổi kịp trong đêm” và thậm chí còn nhanh hơn cả con tàu ma Flying Dutchman.', '9ed16b5a1f8545618a718b6f2ad4a6de1.jpg', 990000, 150000, 0, 0, 0, 0),
(23, 1, 'Thuyền chiến NAPOLEON', 'NAPOLEON là tàu chiến với 90 khẩu pháo thuộc Hải quân Pháp. Đây là tàu chiến hơi nước đầu tiên trên thế giới. Hạ thủy năm 1850, nó dẫn đầu trong số 9 thuyền chiến hơi nước của Pháp, và được đóng trong vòng 10 năm. Số tàu chiến này được thiết kế bởi nhà thiết kế hàng hải nổi tiếng Henri Dupuy de Lôme. Pháp đã điều chiến hạm Napoléon tham gia chiến tranh Crimea (1853 - 1856) trong thành phần của liên minh với Anh, đế chế Ottoman (nay là Thổ Nhĩ Kỳ) và vương quốc Sardinia (tiền thân nước Ý) chống lại nước Nga. Tàu Napoleon vẫn sử dụng kết hợp chân vịt và buồm để di chuyển trên biển, nhưng nó đánh dấu sự kết thúc của những tàu chiến chạy bằng buồm trên thế giới.', '59debb053b9248ecbcfda3ed0ea0ff111.jpg', 990000, 0, 0, 0, 0, 999),
(24, 5, 'Haley-Davidson V-Rob', 'Mẫu mô tô này dựa trên V-Rob của Haley-Davidson. Harley-Davidson có lẽ là nhà sản xuất mô tô nổi tiếng nhất trên thế giới và có trụ sở tại Milwaukee, Wisconsin, Hoa Kỳ.', '0577bd7b7897418db5ab5cc907fe99c61.jpg', 300000, 0, 0, 0, 0, 999),
(31, 1, 'Thuyền buồm Đan Mạch', 'Mô hình thuyền buồm gỗ Danmark được làm thủ công bằng tay và quy trình sản xuất mô hình này tương tự kỹ thuật đóng tàu thật, với từng nan gỗ nhỏ được ghép lên trên khung xương, mặt sàn được ghép bằng từng thanh gỗ xẻ nhỏ theo đúng tỉ lệ của chiếc thuyền thật. Trên mặt sàn hiển thị đầy đủ các chi tiết như: Xuồng cứu sinh, nắp hầm, tời, dây dù, vô lăng, lan can, cầu thang, v.v… theo bản vẽ thiết kế của tàu thật. Lá buồm được may rất tỉ mỉ, dây buồm đan bằng tay với những cánh buồm no gió làm cho mô hình càng thêm chắc chắn và mạnh mẽ. Mô hình thuyền buồm gỗ được lắp ráp hoàn chỉnh và sẵn sàng trưng bày tại mọi nơi mà bạn muốn!', 'dfd324bc19764057a70141f92018d6921.jpg', 2990000, 123456, 0, 0, 0, 2222),
(32, 1, 'Tàu chiến Combo 2 chiếc 25CM', 'Combo 2 Thuyền nhỏ PHONG THỦY Đen & Trắng được làm hoàn toàn thủ công đầy độc đáo & tỉ mỉ, là sản phẩm của sự khéo léo và lòng yêu nghề từ những người thợ thủ công mỹ nghệ. Thuyền buồm gỗ là món quà nhỏ xinh giúp trang trí trên bàn làm việc, góc học tập độc đáo và đầy ý nghĩa với biểu tượng \"Thuận Buồm Xuôi Gió\", kích hoạt may mắn, khai thông thịnh vượng.', 'cde7f690478441f3a5608bc1011ae92b1.jpg', 429000, 20000, 0, 0, 0, 3123),
(33, 1, 'Tàu chiến (Trắng) Combo 2 chiếc 25CM', 'Combo 2 Thuyền nhỏ PHONG THỦY Đen & Trắng được làm hoàn toàn thủ công đầy độc đáo & tỉ mỉ, là sản phẩm của sự khéo léo và lòng yêu nghề từ những người thợ thủ công mỹ nghệ.', '0bd6762e1ae946c0b4d5fef58ac1b28d1.jpg', 429000, 20000, 0, 0, 0, 3123),
(34, 1, 'HMS SOVEREIGN OF THE SEAS 70', 'SOVEREIGN OF THE SEAS là tàu chiến trang bị 90 khẩu pháo đầu tiên của Hải quân Hoàng gia Anh. Nhưng đến khi hạ thuỷ được trang bị đến 102 khẩu bằng đồng theo sự cương quyết của vua Charles I. Sau đó, tàu được đặt những tên khác như Sovereign, và Royal Sovereign. Tàu được hạ thuỷ ngày 13/10/1637, sau đó phục vụ trong khoảng thời gian từ 1638 đến năm 1697 ở Chatham. Sovereign of the seas được dựng không phải để phô trương kỹ thuật mà thực chất nhằm củng cố danh tiếng của Vương quyền Anh. Ngay trong chính tên gọi đó đã thể hiện một tuyên bố chính trị của nhà vua nhằm vực dậy uy quyền xưa của các vua Anh như là một \"vị chúa của biển cả\". Nhằm tôn vinh danh tiếng này, truyền thống hải quân Anh vẫn còn dùng tên HMS Royal Sovereign để đặt cho một số con tàu sau này.', '09be20cb78bb41b6ba680d283595fa741.jpg', 1990000, 0, 0, 0, 0, 123),
(35, 1, 'TITANIC 80 KHÔNG ĐÈN', 'RMS Titanic là con tàu lớn nhất nổi vào thời điểm nó đi vào hoạt động và là chiếc thứ hai trong số ba tàu viễn dương cấp Olympic do White Star Line khai thác. Nó được đóng bởi xưởng đóng tàu Harland and Wolff ở Belfast. Mỗi sản phẩm thuyền buồm là một quá trình công phu, tỉ mỉ, tính toán chế tác từng chi tiết nhỏ rồi lắp ráp chúng một cách điêu luyện để cho ra một mô hình hoàn hảo. Sản phẩm không chỉ được làm ra bởi bàn tay khéo léo, mà còn bởi niềm đam mê, tình yêu nghề từ khối óc sáng tạo và trái tim ấm áp của những nghệ nhân làm du thuyền.', '06bda537af6c452f8024cd3165cb44681.jpg', 4000000, 0, 0, 0, 0, 1234),
(36, 1, 'THUYỀN CHIẾN WASA 50 ĐEN', 'WASA được đóng theo đơn đặt hàng của nhà vua Thụy Điển Gustavus Adolphus cho mục đích mở rộng quân sự trong cuộc chiến tranh với Ba Lan - Litva (1621–1629). Nó là chiếc thuyền lớn nhất từng được đóng thời bấy giờ. Ngày nay, Wasa là con tàu duy nhất từ thế kỷ 17 còn được bảo tồn. Nó hiện được trưng bày ở Bảo tàng Vasa và trở thành một trong những địa điểm tham quan hấp dẫn nhất ở vùng Scandinavia.', '84d3fabf0a1742c0b57682ca2e790c6c1.jpg', 5000000, 1000000, 0, 0, 0, 1923),
(37, 1, 'CUTTY SARK 70', 'CUTTY SARK là một trong những con tàu chạy nhanh nhất thế giới. Được thiết kế bởi Hercules Linton, và hạ thủy ở cảng Dunbarton, Scotland năm 1869. Thân tàu thon mảnh và có số lượng buồm nhiều hơn bất cứ con tàu nào trước đó cho phép tàu đạt vận tốc rất cao. Do vậy, vào những năm 1870, Cutty Sark lướt mình khắp các vùng biển Trung Hoa và Viễn Đông cho công cuộc vận chuyển chè, và được đánh giá như một trong những con tàu có vận tốc nhanh nhất.', '7239e383c4dd4a3892d8581b2392d9041.jpg', 3750000, 200000, 0, 0, 0, 1000),
(38, 2, 'Tranh Gỗ Thuận Buồm Xuôi Gió', 'Theo phong thuỷ bức tranh thuyền buồm mà người Việt Nam hay gọi là thuận buồm xuôi gió mang ý nghĩa về một công việc kinh doanh, con đường công danh thuận lợi và phát triển. Hình ảnh con thuyền trong bức tranh với cánh buồm căng gió, lướt nhẹ trên mặt biển với ý nghĩa đón tài đón lộc, thuyền trở lộc vào nhà và mang lại may mắn. Chính bởi vậy tranh thuận buồm xuôi gió không chỉ đẹp để trang trí nhà mà còn mang hàm ý về sự mong cầu may mắn.', '9d25721cf0ff4023a0dad5d34cea18881.jpg', 9000000, 0, 0, 0, 0, 2131),
(39, 2, 'Tranh đồng hồ dát vàng Di lạc', 'Chất liệu: Gỗ hương dát vàng\r\nKích thước: Ngang 81cm x cao 41cm\r\nMàu sắc: gỗ tự nhiên\r\nBảo hành 5 năm – Bảo trì trọn đời', '2610de9a41804400b83f606c0af38a311.jpg', 8100000, 90000, 0, 0, 0, 12312),
(40, 2, 'Tranh lý ngư vọng nguyệt cẩn ốc', 'Tranh Lý ngư vọng nguyệt: đại diện cho thủy khí dồi dào liên tục, vạn sự viên mãn. Chính vì vậy, tác dụng kích tài lộc và công danh rất tốt. Tranh nên treo trong thư phòng, phòng khách theo hướng 2 chú cá (1 đực, 1 cái) hướng vào nhau.', '3ced1012b17943818b4f8cf18f54a0db1.jpg', 14000000, 0, 0, 0, 0, 1231),
(41, 2, 'Tranh vinh hoa phú quý gỗ hương dát vàng', '– Chất liệu: gỗ hương\r\n– Kích thước: Cao 1m07 x Ngang 35\r\n– Kiểu dáng: cổ điển\r\n– Màu sắc: gỗ tự nhiên\r\n– Bảo hành 5 năm – Bảo trì trọn đời', 'ff32a3150de04b13a58ab6c4acc5a4401.jpg', 15900000, 0, 0, 0, 0, 123),
(42, 2, 'Tranh tứ quý gỗ gụ', 'Tranh tứ quý Gỗ gụ\r\nKT mỗi tấm dài 1m15, rộng 36cm, dày 4cm', 'de77ee5f20e643f1a0671425d32282211.jpg', 10000000, 0, 0, 0, 0, 2131),
(43, 2, 'Đồng hồ tranh mỹ nghệ 40*60 DHM202', '– Chất liệu: gỗ tự nhiên\r\n– Kích thước: 40 x 60 (cm)', '96a8f0ae895a4c988e60483598d1b7c61.jpg', 1000000, 0, 0, 0, 0, 3123),
(44, 2, 'Tranh đồng hồ khổng tước dát vàng', '– Chất liệu: gỗ Hương + dát vàng.\r\n– Kích thước: 81 x 41 (cm)', 'e869dfecae8e4202904fead4e366e03e1.jpg', 4000000, 0, 0, 0, 0, 1231),
(45, 2, 'Tranh gỗ hương dát vàng mã đáo thành công', '– Chất liệu: gỗ hương + dát vàng\r\n– Kích thước: 1.55m x 0.79m', '0c43f73ba3d7491c99da46542c783c061.jpg', 18290000, 100000, 0, 0, 0, 1233),
(46, 2, 'Tranh tứ quý gỗ hương huyết', 'Một bộ tranh gồm có 4 bức với tên gọi là Tùng Cúc Trúc Mai.\r\nHọa tiết chạm trổ rõ nét, những đường nét được chúng tôi đục thủ công 100%, được hiện lên rõ rệt và vô cùng đặc sắc.\r\nNhững nét chạm được hiện lên rất có hồn như một sức sống mãnh liệt mà nghệ nhân muốn thể hiện bằng cả tâm huyết và sự lành nghề của mình thả hồn vào sản', '890cc69dfacc47e5bf4cede50b493ce71.jpg', 21900000, 5900000, 0, 0, 0, 1312),
(47, 2, 'Tranh cá kiểu mới', 'Tranh cá chép đang là 1 dòng tranh được rất nhiều người chơi tranh tìm kiếm, không chỉ đẹp về hình tượng mà còn mang nhiều tài lộc cho người sử dụng.', '8987cfe6cc3c4f1e90b69afc1e2ec8a81.jpg', 7390000, 100000, 0, 0, 0, 3123),
(48, 2, 'Tranh thuận buồm xuôi gió gỗ gõ đỏ', 'Ý nghĩa tranh phong thủy là điều bạn cần biết trước khi quyết định mua tranh phong thủy để trang trí cho ngôi nhà thân yêu của bạn giúp bạn chọn lựa đúng sẽ đem đến cho bạn những kiến thức bổ ích về thuật phong thủy, từ đó biết được bạn cần treo tranh gì trong ngôi nhà hay trong phòng làm việc của mình.', 'edec71ac07174a7d97a144bf7f23e9511.jpg', 18900000, 1000000, 0, 0, 0, 2133),
(49, 9, 'Bộ bàn ghế gỗ cẩm lai Rồng Phương Đông', '– Chất liệu: gỗ cẩm lai (Xuất xứ từ Việt Nam và Campuchia)\r\n– Kích thước: chân 15\r\n– Đoản: dài 2,7m x sâu 75cm x cao 1,84m.\r\n– Ghế đơn: ngang 1,2m x sâu 75 cm x cao 1,6m.\r\n– Mặt bàn: dài 1,93m x rộng 1,17m x cao 64cm.\r\n– Đôn cao: vuông 55cm x cao 1m\r\n– Đôn kẹp: 71x 56cm x cao 60cm\r\n– Đôn ngồi: vuông 43cm x cao 45cm\r\n– Gồm 12 món : 01 bàn, 04 ghế, 01 đoản, 02 bàn nách, 02 đôn ngồi, 2 đôn cao', 'dc70390e9f0e4bd4b603462154b71b121.jpg', 2000000000, 100000000, 0, 0, 0, 12),
(50, 8, 'Tượng thế tôn gỗ mít', 'Chất liệu Gỗ mít 100% (Lựa chọn khác: Gỗ Hương, Mít, Dổi, Gỗ Gụ, Gỗ Gõ đỏ, căm xe, Gỗ Mun, Gỗ Trắc, Gỗ Lu)', '09c59f9d5a4046eab877acd6bc3aa46e1.jpg', 50000000, 0, 0, 0, 0, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(255) DEFAULT 'Default Product Category Name',
  `product_category_description` text DEFAULT 'Default Product Category Description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`, `product_category_description`) VALUES
(1, 'Thuyền gỗ', 'Những tác phẩm thủ công \"Thuyền gỗ\" cực kỳ tinh xảo - từ những chiếc thuyền buồm cổ điển đến thuyền cá đơn giản, mang vẻ đẹp độc đáo của gỗ tự nhiên cao cấp. Mỗi chi tiết nhỏ tôn vinh vẻ đẹp và sức hút của từng thước gỗ, tạo nên không gian trang nhã và ấm áp chắc chắn sẽ tạo nên sự hài lòng cho khách hàng.'),
(2, 'Tranh gỗ', 'Tranh gỗ mỹ nghệ được làm từ các loại gỗ quý trong tự nhiên. Bản thân gỗ đã có sức mạnh tâm linh của nguồn linh khí hấp thụ từ đất trời. Đặc biệt, các hình tượng thể hiện ở bức tranh mang những ý nghĩa về mặt phong thủy. Đây xứng đáng là vật phẩm phong thủy hàng đầu có thể góp phần tác động lên các luồng khí giúp mang điều tốt đến con người.'),
(3, 'Bộ bình trà', 'Các bộ ấm chén gốm tử sa được sử dụng thường xuyên trong các thiết kế nội thất không gian cổ điển. Ở một bộ trà tử sa toát lên vẻ đẹp tao nhã, mộc mạc, đầy khí chất. Hiện nay gốm sứ Sơn Lý chúng tôi có rất nhiều mẫu mã ấm chén mới hiện đại phù hợp với mọi không gian kiến trúc của bạn.'),
(4, 'Trống đồng', 'Trống đồng là biểu tượng của nền văn hóa và văn minh từ lâu đời của cha ông ta, và đây cũng là một trong những đồ trang trí tốt nhất cho ngôi nhà. Những sản phẩm trống đồng cao cấp được hoàn thành thể hiện trình độ, và khả năng điêu khắc tài chính của những nghệ nhân làng nghề Đại Bái.'),
(5, 'Xe mô-tô gỗ', 'Các mẫu xe mô tô bằng gỗ được làm bằng gỗ tự nhiên. Vì lý do đó sản phẩm không chỉ đẹp mà còn không độc hại và thân thiện với môi trường.'),
(8, 'Tượng gỗ', 'Ngày nay, khi cuộc sống ngày càng phát triển chúng ta thường để tâm đến không gian nhà cửa của mình. Việc chơi Phong Thủy cũng đã trở nên phổ biến hơn. Đặc biệt những mẫu Tượng Gỗ đẹp đang được rất nhiều người ưa chuộng và săn đón.'),
(9, 'Bàn ghế gỗ', 'Bàn ghế gỗ là tên gọi chung của những món bàn ghế thường được dùng trong phòng khách gia đình như salon gỗ, sofa gỗ, trường kỷ, ghế dây, ghế gỗ nằm.'),
(10, 'frer5g', 'zfw');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_image_file_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `product_image_file_name`) VALUES
(1, 1, 'i2.jpg'),
(2, 1, 'i3.jpg'),
(3, 1, 'i4.jpg'),
(4, 1, 'i5.jpg'),
(5, 2, '2_i2.jpg'),
(6, 2, '2_i3.jpg'),
(7, 2, '2_i4.jpg'),
(8, 2, '2_i5.jpg'),
(10, 5, '522.jpg'),
(11, 5, '533.jpg'),
(12, 5, '544.jpg'),
(13, 5, '555.jpg'),
(14, 8, '822.jpg'),
(15, 8, '833.jpg'),
(16, 8, '844.jpg'),
(17, 13, '1322.jpg'),
(18, 13, '1333.jpg'),
(19, 16, '1622.jpg'),
(20, 16, '1633.jpg'),
(21, 16, '1644.jpg'),
(22, 16, '1655.jpg'),
(23, 17, '1722.jpg'),
(24, 17, '1733.jpg'),
(25, 17, '1744.jpg'),
(26, 19, '1922.jpg'),
(27, 19, '1933.jpg'),
(28, 19, '1944.jpg'),
(29, 19, '1955.jpg'),
(30, 20, '2022.jpg'),
(31, 20, '2033.jpg'),
(32, 20, '2044.jpg'),
(33, 21, '2122.jpg'),
(34, 21, '2133.jpg'),
(35, 21, '2144.jpg'),
(36, 21, '2155.jpg'),
(37, 22, '2222.jpg'),
(38, 22, '2233.jpg'),
(39, 22, '2244.jpg'),
(40, 23, '2322.jpg'),
(41, 23, '2333.jpg'),
(42, 24, '2422.jpg'),
(43, 24, '2433.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_review`
--

CREATE TABLE `product_review` (
  `product_review_id` int(11) NOT NULL,
  `user_account_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_review_content` text DEFAULT NULL,
  `review_owner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_review`
--

INSERT INTO `product_review` (`product_review_id`, `user_account_id`, `product_id`, `product_review_content`, `review_owner`) VALUES
(17, 7, 1, 'Sốp bán hàng không có tâm', 'Trần Hoàng Yến'),
(18, 7, 1, 'Bán ko được thì nghỉ đi', 'Trần Hoàng Yến'),
(19, 1, 49, 'Chất lượng không phải bàn. Vì nhận hàng chỉ có ghế', 'Tấn Kiệt'),
(20, 1, 19, 'Lừa đảo', 'Tấn Kiệt'),
(50, 1, 49, 'zz', 'kietmeme'),
(51, 1, 49, 'nhu l', 'kietmeme'),
(52, 1, 49, 'nhu c', 'kietmeme'),
(53, 1, 49, 'zzz', 'kietmeme'),
(54, 1, 49, 'zzz', 'kietmeme');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_account`
--

CREATE TABLE `user_account` (
  `user_account_id` int(11) NOT NULL,
  `user_username` varchar(255) DEFAULT NULL CHECK (char_length(`user_username`) >= 8),
  `user_password` varchar(255) DEFAULT NULL CHECK (char_length(`user_password`) >= 8),
  `user_gender` varchar(10) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_phonenumber` char(12) DEFAULT NULL,
  `user_address` text DEFAULT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_member_tier` varchar(255) DEFAULT 'Đồng',
  `user_point` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_account`
--

INSERT INTO `user_account` (`user_account_id`, `user_username`, `user_password`, `user_gender`, `user_email`, `user_phonenumber`, `user_address`, `user_firstname`, `user_lastname`, `user_member_tier`, `user_point`) VALUES
(1, 'kietmeme', '02122003', 'Khác', 'kietdeptrai102x@gmail.com', '', 'Sống Ở Bình Dương', 'Kiệt zzzz', 'Tấn', 'Đồng', 0),
(7, 'tranhoangyen', '09122002', 'Khác', 'hoangyen3123@gmail.com', '', '36/13, DD160, Lã Xuân Oai, Tăng nhơn PHú A. TP THỦ ĐỨC', 'Yến', 'Trần thanh', 'Đồng', 0),
(13, 'thanhyenn', '09122002', 'nữ', 'thanhyen@gmail.com', '0366035415', '160 Lã Xuân Oai.', '', 'Võ Thanh', 'Đồng', 0),
(14, 'kietmemez', '09122002', 'Khác', 'killmeplease00008@gmail.com', '', 'asdas', 'Huynh tan kiet', 'kiet', 'Đồng', 0),
(15, 'kietmemezzz', '09122002', 'nam', 'zzzcasdfhsdhf@gmail.com', '2122003789', 'asdas', 'Huynh tan kiet', '', 'Kim Cương', 4000),
(16, 'hhehwhfhweh', 'user_member_tier', 'Nam', 'killmeplease00008@gmail.com', '02122003789', 'ẻgergergerg', 'Huynh', 'kiet', 'Đồng', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_order`
--

CREATE TABLE `user_order` (
  `user_order_id` int(11) NOT NULL,
  `user_account_id` int(11) DEFAULT NULL,
  `order_time` datetime DEFAULT NULL,
  `user_order_buyer_name` varchar(255) DEFAULT NULL,
  `user_order_address` varchar(255) DEFAULT NULL,
  `user_order_email` varchar(255) DEFAULT NULL,
  `user_order_phonenumber` char(12) DEFAULT NULL,
  `is_processed` tinyint(1) DEFAULT 0,
  `is_delivered` tinyint(1) DEFAULT 0,
  `order_total_value` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_order`
--

INSERT INTO `user_order` (`user_order_id`, `user_account_id`, `order_time`, `user_order_buyer_name`, `user_order_address`, `user_order_email`, `user_order_phonenumber`, `is_processed`, `is_delivered`, `order_total_value`) VALUES
(10, 1, '2023-08-04 15:23:05', 'Thanh Yến Hãmx', 'Sống Ở Bình Dương', 'Yenxingai@gmail.com', '0978364000', 1, 1, 12190000),
(11, 1, '2023-08-04 15:23:38', 'Nguyễn Ngọc Minh Đan  ', 'Sống Ở Bình Dương', 'ngocdan@gmail.com', '0978364000', 1, 1, 109710000),
(13, 13, '2023-08-04 22:52:40', 'Nguyễn Ngọc Minh Đan ', '160 Lã Xuân Oai.', 'mdannn@gmail.com', '0366035415', 1, 1, 12190000),
(14, 1, '2023-08-04 23:30:12', 'Tấn Kiệt', 'Sống Ở Bình Dương', 'Kietdz102@gmail.com', '0978364000', 1, 0, 4290000),
(15, 1, '0000-00-00 00:00:00', 'Tấn Kiệt', 'Sống Ở Bình Dương', 'Kietdz10222@gmail.com', '0978364000', 1, 0, 2158000),
(23, 1, '2024-05-26 22:05:39', 'Tấn Kiệt zzzz', 'Sống Ở Bình Dương', 'kietdeptrai102x@gmail.com', '02122003789', 1, 0, 1900000000),
(24, 16, '2024-05-27 05:35:08', 'kiet Huynh', 'ẻgergergerg', 'killmeplease00008@gmail.com', '02122003789', 0, 0, 1900000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_order_product`
--

CREATE TABLE `user_order_product` (
  `user_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `order_product_amount` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_order_product`
--

INSERT INTO `user_order_product` (`user_order_id`, `product_id`, `product_name`, `order_product_amount`) VALUES
(10, 2, 'Amerigo 260CM', 1),
(11, 2, 'Amerigo 260CM', 9),
(13, 2, 'Amerigo 260CM', 1),
(14, 19, 'Tàu chở hàng France II', 1),
(15, 11, 'Trống đồng mỹ nghệ - TRO2', 1),
(15, 12, 'Mặt trống đồng Việt Nam - TRO1', 2),
(23, 49, 'Bộ bàn ghế gỗ cẩm lai Rồng Phương Đông', 1),
(24, 49, 'Bộ bàn ghế gỗ cẩm lai Rồng Phương Đông', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_account_id`);

--
-- Chỉ mục cho bảng `discount_event`
--
ALTER TABLE `discount_event`
  ADD PRIMARY KEY (`discount_event_id`),
  ADD KEY `fk_discount_event_product_category` (`product_category_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_product_category` (`product_category_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `fk_product_image_product` (`product_id`);

--
-- Chỉ mục cho bảng `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`product_review_id`),
  ADD KEY `fk_product_review_product` (`product_id`),
  ADD KEY `fk_product_review_user` (`user_account_id`);

--
-- Chỉ mục cho bảng `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_account_id`);

--
-- Chỉ mục cho bảng `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`user_order_id`),
  ADD KEY `fk_user_order_user_account` (`user_account_id`);

--
-- Chỉ mục cho bảng `user_order_product`
--
ALTER TABLE `user_order_product`
  ADD PRIMARY KEY (`user_order_id`,`product_id`),
  ADD KEY `fk_user_order_product_product` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `discount_event`
--
ALTER TABLE `discount_event`
  MODIFY `discount_event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `product_review`
--
ALTER TABLE `product_review`
  MODIFY `product_review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `user_order`
--
ALTER TABLE `user_order`
  MODIFY `user_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `discount_event`
--
ALTER TABLE `discount_event`
  ADD CONSTRAINT `fk_discount_event_product_category` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_product_category` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_product_image_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `fk_product_review_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_product_review_user` FOREIGN KEY (`user_account_id`) REFERENCES `user_account` (`user_account_id`);

--
-- Các ràng buộc cho bảng `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `fk_user_order_user_account` FOREIGN KEY (`user_account_id`) REFERENCES `user_account` (`user_account_id`);

--
-- Các ràng buộc cho bảng `user_order_product`
--
ALTER TABLE `user_order_product`
  ADD CONSTRAINT `fk_user_order_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_user_order_product_user_order` FOREIGN KEY (`user_order_id`) REFERENCES `user_order` (`user_order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
