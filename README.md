# Demo Map API sử dụng API Goong

## **Giới thiệu**

Dự án này là một ví dụ minh họa cách sử dụng API Goong để tạo một ứng dụng bản đồ đơn giản. Ứng dụng được thiết kế để mang lại trải nghiệm tìm kiếm và tương tác bản đồ dễ dàng cho người dùng. Các tính năng chính của ứng dụng bao gồm:

- **Tìm kiếm địa chỉ:** Cho phép người dùng tìm kiếm địa chỉ và hiển thị gợi ý tìm kiếm để giúp họ nhanh chóng định vị.
- **Đánh dấu vị trí trên bản đồ:** Người dùng có thể đánh dấu vị trí mong muốn trên bản đồ để lưu trữ và chia sẻ thông tin.
- **Xác định vị trí hiện tại:** Ứng dụng cung cấp khả năng xác định vị trí hiện tại của người dùng và ghim tọa độ tương ứng trên bản đồ.
- **Phóng to, thu nhỏ và quay:** Người dùng có thể tương tác với bản đồ một cách trực quan bằng cách phóng to, thu nhỏ và quay.

Với giao diện thân thiện và tính năng đa dạng, dự án này giúp người dùng khám phá thế giới xung quanh một cách thuận tiện và thú vị.

## **Yêu cầu**

- Trình duyệt hỗ trợ HTML5.
- Kết nối Internet.
- API Key từ [Goong Maps](https://link-to-goong-maps-api-docs).

## **Bắt đầu**

1. **Clone repository từ GitHub:**

    ```bash
    git clone https://github.com/username/demo-goong-map-api.git
    cd demo-goong-map-api
    ```

2. **Tạo một tệp index.php trong thư mục gốc của dự án và thêm API Key của bạn vào tệp này:**

    ```php
    $apiKey = 'YOUR_GOONG_API_KEY';
    $apiKeyMap = 'YOUR_GOONG_MAP_API_KEY';
    ```

3. **Sử dụng một máy chủ web như Apache để chạy dự án.**

## **Công nghệ sử dụng**

- **[Goong Maps API](https://link-to-goong-maps-api-docs):** Để hiển thị và tương tác với bản đồ.
- **Goong JS:** Để tích hợp các chức năng của Goong Maps vào ứng dụng.
- **Geocoding API:** Để chuyển đổi địa chỉ thành tọa độ và ngược lại.
- **Place Autocomplete:** Cung cấp gợi ý tìm kiếm khi nhập địa chỉ hoặc tên địa điểm.
- **HTML5, CSS3, JavaScript:** Các công nghệ web cơ bản để xây dựng giao diện và tương tác người dùng.
